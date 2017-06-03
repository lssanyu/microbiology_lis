<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Organism extends Eloquent
{
	/**
	 * Enabling soft deletes for organisms.
	 *
	 */
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
    	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'organisms';
	/**
	 * Set compatible drugs
	 *
	 * @return void
	 */
	// todo: should set several antibiotics at ago... evetually
	public function setAntibiotic($drug_id,$resistant_max,$intermediate_min,$intermediate_max,$sensitive_min){

		$zoneDiameter = new ZoneDiameter;
		$zoneDiameter->drug_id = $drug_id; 
		$zoneDiameter->organism_id = $this->id;
		$zoneDiameter->resistant_max = $resistant_max;
		$zoneDiameter->intermediate_min = $intermediate_min;
		$zoneDiameter->intermediate_max = $intermediate_max;
		$zoneDiameter->sensitive_min = $sensitive_min;
		$zoneDiameter->save();
	}

	/**
	 * Drug-susceptibility relationship
	 */
	public function susceptibility()
	{
	  return $this->hasMany('DrugSusceptibility');
	}

	/**
	 * sensitivity relationship for a single test
	 */
	public function zoneDiameters()
	{
	  return $this->hasMany('ZoneDiameter');
	}
}
