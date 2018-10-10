<?php

class Isolate extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'unhls_isolates';

	/**
	 * Isolate status constants
	 */
	const ACCEPTED = 1;
	const REJECTED = 2;
	const REFERRED = 3;

		/**
	 * Isolate-Tests status constants
	 */
	const PENDING = 1;// if there any uncompleted tests
	const COMPLETED = 2;// if all tests are completed

	public function test()
	{
		return $this->belongsTo('UnhlsTest', 'test_id');
	}

	public function specimenType()
	{
		return $this->belongsTo('SpecimenType');
	}

	public function facility()
    {
        return $this->belongsTo('UNHLSFacility','facility_id');
	}

	public function organism()
	{
		return $this->belongsTo('Organism','organism_id');
	}
	
	public function referral()
    {
        return $this->belongsTo('Referral');
    }

	
	public function drugSusceptibilities()
	{
		return $this->hasMany('DrugSusceptibility');
	}
	//indicate the foreign key col. name
	public function testReasons()
	{
		return $this->belongsTo('TestReason','test_reason_id');
	}

	public function dispatched_by()
	{
		return $this->belongsTo('User', 'dispatched_by', 'id');
	}

	  /**
	 * Check if specimen is referred
	 *
	 * @return boolean
	 */
    public function isReferred()
    {
    	if(is_null($this->referral))
    	{
    		return false;
    	}
    	else {
    		return true;
    	}
	}
	
	  /**
    * Check if specimen is ACCEPTED
    *
    * @return boolean
    */
    public function isAccepted()
    {
        if($this->specimen_status_id == UnhlsSpecimen::ACCEPTED)
        {
            return true;
        }
        else {
            return false;
        }
	}
	
	/**
    * Check if specimen is REFFERED OUT
    *
    * @return boolean
    */
    public function isReferredOut()
    {
        if($this->referral->facility_to)
        {
            return true;
        }
        else {
            return false;
        }
    }
	
	 /**
    * Check if isolate is rejected
    *
    * @return boolean
    */
    public function isRejected()
    {
		return ($this->specimen_status_id == Isolate::REJECTED) ? true : false ;
    }

	public function isCompleted()
	{
		return ($this->test_status_id == Isolate::COMPLETED) ? true : false ;
	}

	public function isPending()
	{
		return ($this->test_status_id == Isolate::PENDING) ? true : false ;
	}

	public function hasPendingTest()
	{
		$i = 0;
		foreach ($this->tests as $test) {
			if ($test->test_status_id == UnhlsTest::PENDING ||
			$test->test_status_id == UnhlsTest::STARTED) {
				$i++;
			}
		}
		return ($i>0) ? true : false;
	}

	public function countPendingTests()
	{
		$i = 0;
		foreach ($this->tests as $test) {
			if ($test->test_status_id == UnhlsTest::PENDING ||
			$test->test_status_id == UnhlsTest::STARTED) {
				$i++;
			}
		}
		return $i;
	}

}
