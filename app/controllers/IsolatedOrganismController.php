<?php

class IsolatedOrganismController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$isolatedOrganisms = IsolatedOrganism::with('test','organism')->get();

		//return $isolatedOrganisms;
		$isolates = IsolatedOrganism::orderBy('id','desc')->get();		
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
		$organisms = ['select']+Organism::orderBy('name','ASC')->lists('name','id');		
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
			'lab_id'       => 'required',
			'age'       => 'required',
			'gender' => 'required',			
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}else{

		$isolatedOrganism = new IsolatedOrganism;			
		$isolatedOrganism->lab_id = Input::get('lab_id');
		$isolatedOrganism->age = Input::get('age');
		$isolatedOrganism->gender = Input::get('gender');	
		
		$isolatedOrganism->facility_id = Input::get('facility');
		$isolatedOrganism->district_id = Input::get('district');
		$isolatedOrganism->organism_id = Input::get('organism');
		$isolatedOrganism->test_reason_id = Input::get('test_reason');	
		$isolatedOrganism->specimen_type_id = Input::get('specimen_type');	
		
		$isolatedOrganism->preparation_date = Input::get('preparation_date');
		$isolatedOrganism->dispatch_date = Input::get('dispatch_date');
		$isolatedOrganism->received_date = Input::get('date_received');
		$isolatedOrganism->received_by = Auth::user()->id;		
		$isolatedOrganism->dispatched_by = Auth::user()->id;
		$isolatedOrganism->save();

			//save to the drug_susceptibility table
			$drugSusceptibility = new DrugSusceptibility;
			$drugSusceptibility->drug_id = Input::get('ast_pattern_drug');
			$drugSusceptibility->drug_susceptibility_measure_id = Input::get('ast_pattern_result');			
			$drugSusceptibility->user_id = Auth::user()->id;		
			$drugSusceptibility->isolated_organism_id = $isolatedOrganism->id;
			$drugSusceptibility->save();

			// create tests
            // foreach (Input::get('test_types') as $id) {

            //     $testTypeID = (int)$id;
            //     $test = new UnhlsTest;
            //     $test->test_type_id = $testTypeID;
            //     $test->specimen_id = $specimen->id;
            //     if (Input::get('rejectionReason')) {
	        //         $test->test_status_id = UnhlsTest::REJECTED_PREANALYSIS;
            //     }else{
	        //         $test->test_status_id = UnhlsTest::PENDING;
            //     }
            //     $test->created_by = Auth::user()->id;
            //     $test->save();
            // }

		
		try{			
			$url = Session::get('SOURCE_URL');
			return Redirect::to($url)
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$isolate = IsolatedOrganism::find($id);
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
		$isolatedOrganism = IsolatedOrganism::find($id);

		$isolatedOrganism->lab_id = Input::get('lab_id');
		$isolatedOrganism->age = Input::get('age');
		$isolatedOrganism->gender = Input::get('gender');	
		
		$isolatedOrganism->facility_id = Input::get('facility');
		$isolatedOrganism->district_id = Input::get('district');
		$isolatedOrganism->organism_id = Input::get('organism');
		$isolatedOrganism->test_reason_id = Input::get('test_reason');	
		$isolatedOrganism->specimen_type_id = Input::get('specimen_type');		
	
		//$isolatedOrganism->susceptibility_measure_id = $drugs;
		$isolatedOrganism->preparation_date = Input::get('preparation_date');
		$isolatedOrganism->dispatch_date = Input::get('dispatch_date');
		$isolatedOrganism->received_date = Input::get('date_received');
		$isolatedOrganism->received_by = Auth::user()->id;		
		$isolatedOrganism->dispatched_by = Auth::user()->id;
		$isolatedOrganism->save();

			//save to the drug_susceptibility table
			$drugSusceptibility = new DrugSusceptibility;
			$drugSusceptibility->drug_id = Input::get('ast_pattern_drug');
			$drugSusceptibility->drug_susceptibility_measure_id = Input::get('ast_pattern_result');			
			$drugSusceptibility->user_id = Auth::user()->id;		
			$drugSusceptibility->isolated_organism_id = $isolatedOrganism->id;
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
		$isolatedOrganism = IsolatedOrganism::find($id);
		$isolatedOrganism->delete();
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
		$organismId =Input::get('organism_id');
		$antibiotics = Organism::find($sorganismId)->antibiotics;

		return View::make('isolate.antibioticsList')
			->with('antibiotics', $antibiotics);
	}

}
