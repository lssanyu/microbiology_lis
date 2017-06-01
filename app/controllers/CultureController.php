<?php

class CultureController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$test = UnhlsTest::find($id);
		$test->load(
			'cultureObservations.cultureDuration',
			'isolatedOrganisms.organism',
			'isolatedOrganisms.drugSusceptibilities.drug',
			'isolatedOrganisms.drugSusceptibilities.drugSusceptibilityMeasure');

		$content = View::make('test.culture.microbiologyreport')
			->with('test', $test);
		$pdf = App::make('dompdf');
		$pdf->loadHTML($content);
		return $pdf->stream('microbiology.pdf');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$test = UnhlsTest::find($id);

		$test->load(
			'isolatedOrganisms.organism',
			'cultureObservations.cultureDuration',
			'isolatedOrganisms.drugSusceptibilities.drug',
			'isolatedOrganisms.drugSusceptibilities.drugSusceptibilityMeasure');

		$drugSusceptibilityMeasures = ['']+DrugSusceptibilityMeasure::all()->lists('interpretation','id');
		$cultureDurations = ['']+CultureDuration::all()->lists('duration','id');
		$organisms = ['']+Organism::all()->lists('name','id');

		return View::make('test.culture.worksheet')
			->with('drugSusceptibilityMeasures', $drugSusceptibilityMeasures)
			->with('cultureDurations', $cultureDurations)
			->with('organisms', $organisms)
			->with('test', $test);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
