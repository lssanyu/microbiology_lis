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
	public function setDrugs(){
		// 
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
	public function zoneDiameter()
	{
	  return $this->hasMany('ZoneDiameter');
	}
}
