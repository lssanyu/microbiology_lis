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
	public function index()
	{
		//List all specimens
		$specimens = UnhlsSpecimen::orderBy('time_accepted','DESC')->get();
		//Load the view and pass the specimens
		return View::make('specimen.index')->with('specimens',$specimens);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// sample collection default details
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');
		try {
			$nextSpecimenID = UnhlsSpecimen::orderBy('id','DESC')->first()->id++;
		} catch (Exception $e) {
			$nextSpecimenID = 1;
		}
		$thisYear = substr($now->format('Y'), 2);
		$nextLabID = $thisYear.'/'.$nextSpecimenID;
		$disease = ['select Suspected Disease']+Disease::lists('name', 'id');
		$specimenTypes = ['select Specimen Type']+SpecimenType::lists('name', 'id');
		$facilities = ['select Facility']+UNHLSFacility::lists('name', 'id');


		//Load Test Create View
		return View::make('specimen.create')
					->with('collectionDate', $collectionDate)
					->with('receptionDate', $receptionDate)
					->with('lab_id', $nextLabID)
					->with('disease', $disease)
					->with('specimenType', $specimenTypes)
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
				'facility' => 'required|non_zero_key',
			];
		} else {
			$rules = [
				'time_collected' => 'required',
				'time_accepted' => 'required',
				'specimen_type' => 'required',
				'test_types' => 'required',
				'facility' => 'required|non_zero_key',
				'patient_name' => 'required',
			];
		}

		//Create New Test
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('specimen.create')->withInput()->withErrors($validator);
		} else {

			if (Input::get('patient_id')) {
				$patient = UnhlsPatient::find($patient_id);
			}else{
				$patient = new UnhlsPatient;
				$patient->patient_number = Input::get('patient_number');
				$patient->name = Input::get('patient_name');
				$patient->gender = Input::get('gender');
				$patient->dob = Input::get('dob');
				$patient->created_by = Auth::user()->id;
				$patient->save();
			}

            $referral = new Referral;
            // todo: clearify but for now assume all referals are in bound
            $referral->status = Referral::REFERRED_IN;
            $referral->facility_id = Input::get('facility');
            $referral->person = Input::get('person');
            $referral->contacts = Input::get('contacts');
            $referral->user_id =  Auth::user()->id;
            $referral->save();

            // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
            $specimen = new UnhlsSpecimen;
            $specimen->lab_id = Input::get('lab_id');
            $specimen->specimen_type_id = Input::get('specimen_type');
            $specimen->accepted_by = Auth::user()->id;
            $specimen->time_collected = Input::get('time_collected');
            $specimen->patient_id = $patient->id;
            $specimen->referral_id = $referral->id;
            $specimen->suspected_disease_id = Input::get('disease');
            $specimen->time_accepted = Input::get('time_accepted');
            $specimen->save();
            // create tests
            foreach (Input::get('test_types') as $id) {
                $testTypeID = (int)$id;

                $test = new UnhlsTest;
                $test->test_type_id = $testTypeID;
                $test->specimen_id = $specimen->id;
                $test->test_status_id = UnhlsTest::PENDING;
                $test->created_by = Auth::user()->id;
                $test->save();
            }

			$url = Session::get('SOURCE_URL');
			
			return Redirect::to($url)->with('message', 'messages.success-creating-test');
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
			$specimen->referral_id = $referral->id;
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
