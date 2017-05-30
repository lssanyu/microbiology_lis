<?php

class DrugSusceptibilityMeasure extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	// todo: change name of this from Drug susceptibilit to ZoneDiameterInterpretaion zone_diameter_interpretaion
	protected $table = 'drug_susceptibility_measures';
	public $timestamps = false;
}
