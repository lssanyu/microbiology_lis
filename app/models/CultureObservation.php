<?php

class CultureObservation extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'culture_observations';

	public function test()
	{
		return $this->belongsTo('UnhlsTest','test_id');
	}
}
