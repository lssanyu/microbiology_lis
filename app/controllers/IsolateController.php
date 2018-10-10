<?php

class IsolateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($status ='pending')
	{
		//$isolatedOrganisms = IsolatedOrganism::with('test','organism')->get();

		//return $isolatedOrganisms;
		$isolates = Isolate::orderBy('id','desc')->get();		
		return View::make('isolate.index')
		->with('isolates', $isolates);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$now = new DateTime();

		$preparationDate = $now->format('Y-m-d H:i');
		$dispatchDate = $now->format('Y-m-d H:i');
		$dateReceived = $now->format('Y-m-d H:i');
		$districts = ['']+District::orderBy('name','ASC')->lists('name', 'id');
		$organisms = ['']+Organism::orderBy('name','ASC')->lists('name', 'id');		
		$testReasons = ['']+TestReason::orderBy('name','ASC')->lists('name','id');
		$specimenTypes = ['']+SpecimenType::orderBy('name','ASC')->lists('name', 'id');
		$facilities = ['']+UNHLSFacility::orderBy('name','ASC')->lists('name', 'id');
		$drugSusceptabilities = ['select']+Drug::orderBy('name','ASC')->lists('name', 'id');
		$drugSusceptabilityMeasures = ['select']+DrugSusceptibilityMeasure::orderBy('symbol','ASC')->lists('symbol', 'id');
		$users = ['']+User::orderBy('name','ASC')->lists('name', 'id');
		$tests = ['Culture', 'Culture & Sensitivity'];
				
		return View::make('isolate.create')		
		->with('districts', $districts)
		->with('facilities', $facilities)
		->with('organisms', $organisms)
		->with('testReasons', $testReasons)
		->with('specimenTypes', $specimenTypes)
		->with('drugSusceptabilities', $drugSusceptabilities)
		->with('drugSusceptabilityMeasures', $drugSusceptabilityMeasures)
		->with('preparationDate', $preparationDate)
		->with('dispatchDate', $dispatchDate)		
		->with('dateReceived', $dateReceived)
		->with('users', $users)
		->with('tests', $tests);	
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(				
			//'lab_id'       => 'required',
			'age'       => 'required',
			'gender' => 'required',			
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}else{

			$nextIsolateID = DB::table('unhls_isolates')->max('id')+1;
			$thisYear = substr(date('Y'), 2);
			$thisMonth = date('m');
			$nextLabID = \Config::get('constants.FACILITY_CODE').'-'.$thisYear.$thisMonth.str_pad($nextIsolateID, 4, '0', STR_PAD_LEFT);

		$isolate = new Isolate;			
		$isolate->lab_id = $nextLabID;

		$isolate->isolateID = Input::get('isolateID');
		$isolate->age = Input::get('age');
		$isolate->gender = Input::get('gender');		
		$isolate->facility_id = Input::get('facility');
		$isolate->district_id = Input::get('district');		
		$isolate->organism_id = Input::get('organism_id');	
		$isolate->test_reason_id = Input::get('test_reason');	
		$isolate->specimen_type_id = Input::get('specimen_type');		
		$isolate->preparation_date = Input::get('preparation_date');
		$isolate->dispatch_date = Input::get('dispatch_date');
		$isolate->received_date = Input::get('date_received');
		$isolate->received_by = Auth::user()->id;		
		$isolate->dispatched_by = Input::get('dispatched_by');
		//dd($nextLabID);
		$isolate->save();

			//save to the drug_susceptibility table
			
			//loop through the collection to get the different antiobiotics and their results

			$drugs = Input::get('drugID');
			$measures = Input::get('measureID');
			
			foreach($drugs as $key => $drug_id){
				$drugSusceptibility = new DrugSusceptibility;
				$drugSusceptibility->drug_id = $drug_id;
				$drugSusceptibility->drug_susceptibility_measure_id = $measures[$key];
				$drugSusceptibility->user_id = Auth::user()->id;		
				$drugSusceptibility->isolate_id = $isolate->id;		
				$drugSusceptibility->save();
			}

			//No need to loop through the test types, since it's only one testtype involved			
          //  foreach (Input::get('test_types') as $id) {

				//$testTypeID = DB::table('test_types')->select('id')->where('name', 'Culture & Sensitivity');
			$testtypes =TestType::where('name',  'Culture & Sensitivity');


			 foreach ($testtypes  as $id) {
			 	$testTypeID = (int)$id;			 	 
			 	$test = new UnhlsTest;
                $test->test_type_id = $testTypeID;
                $test->isolate_id = $isolate->id;

              	//  if (Input::get('rejectionReason')) {
	              //  $test->test_status_id = UnhlsTest::REJECTED_PREANALYSIS;
               	// }else{
	            $test->test_status_id = UnhlsTest::PENDING;
              	//  }
                $test->created_by = Auth::user()->id;

                $test->save();
			 }





                
           // }

		
		try{			
			$url = Session::get('SOURCE_URL');
			//return Redirect::to($url)
			return Redirect::route('isolate.index')
			->with('message', 'Isolate Successfully Saved!');

		}catch(QueryException $e){
			Log::error($e);
				echo $e->getMessage();
		}		

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
		$isolate = Isolate::find($id);
		$tests = UnhlsTest::where('isolate_id', $isolate->id)->orderBy('time_created','ASC');

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = ['all']+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

			// Pagination
			$tests = $tests->paginate(Config::get('kblis.page-items'));

			//	Barcode
		$barcode = Barcode::first();

		return View::make('isolate.show')
		->with('testSet', $tests)
		->with('isolate', $isolate)
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
		$isolate = Isolate::find($id);
		$specimenTypes = SpecimenType::lists('name', 'id');
		$microorganisms = Organism::lists('name', 'id');	
		$districts = District::lists('name', 'id');
		$facilities = UNHLSFacility::lists('name', 'id');
		
		return View::make ('isolate.edit')
		->with('specimenTypes',$specimenTypes)
		->with('isolate',$isolate)
		->with('microorganisms',$microorganisms)
		->with('districts',$districts)
		->with('facilities',$facilities)		
		;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array('lab_id' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		}else{
		$isolate = Isolate::find($id);

		$isolate->lab_id = Input::get('lab_id');
		$isolate->age = Input::get('age');
		$isolate->gender = Input::get('gender');	
		
		$isolate->facility_id = Input::get('facility');
		$isolate->district_id = Input::get('district');
		$isolate->organism_id = Input::get('organism');
		$isolate->test_reason_id = Input::get('test_reason');	
		$isolate->specimen_type_id = Input::get('specimen_type');		
	
		//$isolatedOrganism->susceptibility_measure_id = $drugs;
		$isolate->preparation_date = Input::get('preparation_date');
		$isolate->dispatch_date = Input::get('dispatch_date');
		$isolate->received_date = Input::get('date_received');
		$isolate->received_by = Auth::user()->id;		
		$isolate->dispatched_by = Auth::user()->id;
		$isolate->save();

			//save to the drug_susceptibility table
			$drugSusceptibility = new DrugSusceptibility;
			$drugSusceptibility->drug_id = Input::get('ast_pattern_drug');
			$drugSusceptibility->drug_susceptibility_measure_id = Input::get('ast_pattern_result');			
			$drugSusceptibility->user_id = Auth::user()->id;		
			$drugSusceptibility->isolated_organism_id = $isolate->id;
			$drugSusceptibility->save();

		$isolate->user_id = Auth::user()->id;
		$isolate->test_id = Input::get('test_id');
		$isolate->organism_id = Input::get('organism_id');
		$isolate->save();
		
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
		$isolate = Isolate::find($id);
		$isolate->delete();
		return $id;
	}

	Private function generateUniqueIsolateID(){

		//Get Year, Month and day of today. If Jan O1 then reset last insert ID to 1 to start a new cycle of IDs 
		$year = date('Y');
		$month = date('m');
		$day = date('d');

		if($month == '01' && $day == '01'){
			$lastInsertId = 1;
		} 
		$lastInsertId = DB::table('isolated_organisms')->max('id')+1;
		$fcode = \Config::get('constants.FACILITY_CODE');
		$num = $year.str_pad($lastInsertId, 6, '0', STR_PAD_LEFT);
		return $fcode.'-'.$num;
	}

	public function antibioticsLists()
	{
		//return "allal";
		$organismId =Input::get('organism_id');
		$antibiotics = Organism::find($organismId)->antibiotics;

		return View::make('isolate.antibioticsList')
			->with('antibiotics', $antibiotics);
	}


	public function susceptibilityMeasuresLists()
	{
		$measureId =Input::get('meaure');
		$susceptibility_measures = DrugSusceptibilityMeasure::find()->susceptibility_measures;

		return View::make('isolate.susceptibilityMeasureList')
		->with('susceptibility_measures', $susceptibility_measures);
	}

}
