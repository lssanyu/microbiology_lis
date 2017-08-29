<?php
use Illuminate\Database\QueryException;

/**
 * Contains specimens resources  
 * 
 */
class SpecimenController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($status='pending')
	{
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){
			$input = Session::get('TESTS_FILTER_INPUT');

		}else{
			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$specimenStatusId = isset($input['specimen_status'])?$input['specimen_status']:'';
		$dateFrom = isset($input['date_from'])?$input['date_from']:'';
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

		// Search Conditions
		if($searchString||$specimenStatusId||$dateFrom||$dateTo){
			$specimens = UnhlsSpecimen::search($searchString, $specimenStatusId, $dateFrom, $dateTo);

			if (count($specimens) == 0) {
				Session::flash('message', trans('messages.empty-search'));
			}
		}elseif ($status == 'pending') {
			// List all the active{pending} specimens
			$specimens = UnhlsSpecimen::with('tests')->where('test_status_id',UnhlsSpecimen::PENDING)->orderBy('id','desc');
		}elseif ($status == 'completed') {
			// List all the completed specimens
			$specimens = UnhlsSpecimen::with('tests')->where('test_status_id',UnhlsSpecimen::COMPLETED)->orderBy('id','desc');
		}elseif ($status == 'all') {
			// List all the completed specimens
			$specimens = UnhlsSpecimen::with('tests')->orderBy('id','desc');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+SpecimenStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		$specimens = $specimens->paginate(Config::get('kblis.page-items'))->appends($input);

		//Load the view and pass the specimens
		return View::make('specimen.index')
					->with('specimens',$specimens)
					->with('status', $status)
					->withInput($input);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($patient_id = 0)
	{
		// sample collection default details
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');
		$disease = ['select Suspected Disease']+Disease::lists('name', 'id');
		$specimenTypes = ['select Specimen Type']+SpecimenType::orderBy('name','ASC')->lists('name', 'id');
		$facilities = ['']+UNHLSFacility::orderBy('name','ASC')->lists('name', 'id');
		$specimenRejectionReasons = RejectionReason::all();

		$existingPatient = false;
		if ($patient_id!=0) {
			$patient = UnhlsPatient::find($patient_id);
			$existingPatient = true;
			//Load Test Create View
			return View::make('specimen.create')
						->with('collectionDate', $collectionDate)
						->with('receptionDate', $receptionDate)
						->with('disease', $disease)
						->with('patient', $patient)
						->with('existingPatient', $existingPatient)
						->with('specimenType', $specimenTypes)
						->with('specimenRejectionReasons', $specimenRejectionReasons)
						->with('facilities', $facilities);
		}
		//Load Test Create View
		return View::make('specimen.create')
					->with('collectionDate', $collectionDate)
					->with('receptionDate', $receptionDate)
					->with('existingPatient', $existingPatient)
					->with('disease', $disease)
					->with('specimenType', $specimenTypes)
					->with('specimenRejectionReasons', $specimenRejectionReasons)
					->with('facilities', $facilities);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Input::get('patient_id')) {
			$rules = [
				'time_collected' => 'required',
				'time_accepted' => 'required',
				'specimen_type' => 'required',
				'test_types' => 'required',
				'facility_from' => 'required|non_zero_key',
			];
		} else {
			$rules = [
				'dob' => 'required',
				'time_collected' => 'required',
				'time_accepted' => 'required',
				'specimen_type' => 'required',
				'test_types' => 'required',
				'facility_from' => 'required|non_zero_key',
				'patient_name' => 'required',
			];
		}

		//Create New Test
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)->withInput(Input::all())->withErrors($validator);
		} else {

			$thisYear = substr(date('Y'), 2);
			if (Input::get('patient_id')) {
				$patient = UnhlsPatient::find(Input::get('patient_id'));
			}else{
				$nextPatientID = DB::table('unhls_patients')->max('id')+1;

				$patient = new UnhlsPatient;
				$nextULIN = $thisYear.'/'.\Config::get('constants.FACILITY_CODE').'/'.str_pad($nextPatientID, 6, '0', STR_PAD_LEFT);
				$patient->ulin = $nextULIN;
				$patient->patient_number = Input::get('patient_number');
				$patient->name = Input::get('patient_name');
				$patient->gender = Input::get('gender');
				$patient->dob = Input::get('dob');
				$patient->created_by = Auth::user()->id;
				$patient->save();
			}
			// todo: check that the from is not equivalent to same facility that the entry is being done in....
			if (Input::get('facility_from')||Input::get('facility_to')) {
				$referral = new Referral;
				$referral->facility_from = Input::get('facility_from');
				if (Input::get('facility_to')) {
					$referral->facility_to = Input::get('facility_to');
				}
				$referral->person = Input::get('person');
				$referral->contacts = Input::get('contacts');
				$referral->user_id =  Auth::user()->id;
				$referral->save();
			}
			$nextSpecimenID = DB::table('specimens')->max('id')+1;

			$thisMonth = date('m');
			$nextLabID = \Config::get('constants.FACILITY_CODE').'-'.$thisYear.$thisMonth.str_pad($nextSpecimenID, 4, '0', STR_PAD_LEFT);

            // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
            $specimen = new UnhlsSpecimen;
            $specimen->lab_id = $nextLabID;
            $specimen->specimen_type_id = Input::get('specimen_type');
            $specimen->accepted_by = Auth::user()->id;
            $specimen->time_collected = Input::get('time_collected');
            $specimen->patient_id = $patient->id;
			if (Input::get('facility_from')||Input::get('facility_to')) {
	            $specimen->referral_id = $referral->id;
			}
            $specimen->suspected_disease_id = Input::get('disease');
            $specimen->time_accepted = Input::get('time_accepted');

            if (Input::get('rejectionReason')) {
				// this refers to pre-analytic rejection of specimen
				$specimen->specimen_status_id = UnhlsSpecimen::REJECTED;
				$specimen->test_status_id = UnhlsSpecimen::COMPLETED;
				$specimen->save();

				// todo: create cascade deletion for it, incase rejection is reversed
				$rejection = new PreAnalyticSpecimenRejection;
				$rejection->specimen_id = $specimen->id;
				$rejection->rejection_reason_id = Input::get('rejectionReason');
				$rejection->rejected_by = Auth::user()->id;
				$rejection->time_rejected = date('Y-m-d H:i:s');
				$rejection->save();
				$message = 'Successfully Rejected Specimen|Lab Id:'.$specimen->lab_id;
			}else{
				$message = 'Successfully Accepted Specimen|Lab Id:'.$specimen->lab_id;
				$specimen->test_status_id = UnhlsSpecimen::PENDING;
				$specimen->save();
			}

            // create tests
            foreach (Input::get('test_types') as $id) {
                $testTypeID = (int)$id;

                $test = new UnhlsTest;
                $test->test_type_id = $testTypeID;
                $test->specimen_id = $specimen->id;
                if (Input::get('rejectionReason')) {
	                $test->test_status_id = UnhlsTest::REJECTED_PREANALYSIS;
                }else{
	                $test->test_status_id = UnhlsTest::PENDING;
                }
                $test->created_by = Auth::user()->id;
                $test->save();
            }
			return Redirect::route('specimen.show', [$specimen->id])
				->with('message', $message);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//Show a specimentype
		$specimen = UnhlsSpecimen::find($id);

		$tests = UnhlsTest::where('specimen_id',$specimen->id)->orderBy('time_created', 'ASC');
		// $tests = $specimen->tests;

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = ['all']+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'));

		//	Barcode
		$barcode = Barcode::first();

		// Load the view and pass it the tests
		return View::make('specimen.show')
					->with('testSet', $tests)
					->with('specimen', $specimen)
					->with('testStatus', $statuses)
					->with('barcode', $barcode);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//Get the specimen
		$specimen = UnhlsSpecimen::find($id);
		$specimenTypes = ['select Specimen Type']+SpecimenType::lists('name', 'id');

		//Open the Edit View and pass to it the $specimen
		return View::make('specimen.edit')
			->with('specimenTypes', $specimenTypes)
			->with('specimen', $specimen);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validate
		$rules = array('name' => 'required');
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		} else {
			// Update
			$specimen = new UnhlsSpecimen;
			$specimen->lab_id = Input::get('lab_id');
			$specimen->specimen_type_id = Input::get('specimen_type');
			$specimen->accepted_by = Auth::user()->id;
			$specimen->time_collected = Input::get('time_collected');
			// todo: fix unknown variable
			// $specimen->referral_id = $referral->id;
			$specimen->suspected_disease_id = Input::get('disease');
			$specimen->time_accepted = Input::get('time_accepted');
			$specimen->save();

			// redirect
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
				->with('message', trans('messages.success-updating-specimen'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$specimen = UnhlsSpecimen::find($id);
		$specimenInUse = TestType::where('specimen_id', '=', $id)->first();
		if (empty($specimenInUse)) {
			// The test category is not in use
			$specimen->delete();
		} else {
			// The test category is in use
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
				->with('message', 'Specimen is in use');
		}
	}
}
