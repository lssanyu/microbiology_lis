<?php

class UnhlsSpecimen extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'specimens';

	public $timestamps = false;

	/**
	 * Specimen status constants
	 */
	const ACCEPTED = 1;
	const REJECTED = 2;
	const REFERRED = 3;

	/**
	 * Specimen-Tests status constants
	 */
	const PENDING = 1;// if there any uncompleted tests
	const COMPLETED = 2;// if all tests are completed

	/**
	 * Test Phase relationship
	 */
	public function testPhase()
	{
		return $this->belongsTo('TestPhase');
	}
	
	/**
	 * Specimen Status relationship
	 */
	public function specimenStatus()
	{
		return $this->belongsTo('SpecimenStatus');
	}

	/**
	 * Specimen Status relationship
	 */
	public function patient()
	{
		return $this->belongsTo('UnhlsPatient');
	}
	
	/**
	 * Specimen Type relationship
	 */
	public function specimenType()
	{
		return $this->belongsTo('SpecimenType');
	}

	/**
	 * Rejected specimen relationship
	 */
	public function rejectedSpecimen()
	{
		return $this->belongsTo('PreAnalyticSpecimenRejection', 'specimen_id', 'id');
	}

	/**
	 * Test relationship
	 */
	public function tests()
    {
        return $this->hasMany('UnhlsTest', 'specimen_id');
    }

    /**
	 * referrals relationship
	 */
	public function referral()
    {
        return $this->belongsTo('Referral');
    }
    
    /**
	 * User (accepted) relationship
	 */
	public function acceptedBy()
	{
		return $this->belongsTo('User', 'accepted_by', 'id');
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
    * Check if specimen is rejected
    *
    * @return boolean
    */
    public function isRejected()
    {
		return ($this->specimen_status_id == UnhlsSpecimen::REJECTED) ? true : false ;
    }

	public function isCompleted()
	{
		return ($this->test_status_id == UnhlsSpecimen::COMPLETED) ? true : false ;
	}

	public function isPending()
	{
		return ($this->test_status_id == UnhlsSpecimen::PENDING) ? true : false ;
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
	/**
	* Search for tests meeting the given criteria
	*
	* @param String $searchString
	* @param String $specimenStatusId
	* @param String $dateFrom
	* @param String $dateTo
	* @return Collection
	*/
	public static function search($searchString = '', $specimenStatusId = 0, $dateFrom = NULL, $dateTo = NULL)
	{
		if ($searchString != '') {
			$specimens = UnhlsSpecimen::with('specimenStatus', 'patient', 'referral.facility', 'specimenType')
				->where(function($q) use ($searchString){

					$q->whereHas('specimenStatus', function($q) use ($searchString){
						$q->where('name', 'like', '%' . $searchString . '%');

					})->orWhereHas('specimenType', function($q) use ($searchString){
						$q->where('name', 'like', '%' . $searchString . '%');

					})->orWhereHas('referral', function($q) use ($searchString){
						$q->whereHas('facility', function($q)  use ($searchString){
							$q->where('name', 'like', '%' . $searchString . '%');
						});

					})->orWhereHas('patient',  function($q) use ($searchString){
						$q->where(function($q) use ($searchString){
							$q->where('name', 'like', '%' . $searchString . '%' )
							->orWhere('patient_number', 'like', '%' . $searchString . '%');

						});
					});
			});

			$specimens = $specimens->orWhere(function($q) use ($searchString){
				$q->where('lab_id', 'like', '%' . $searchString . '%');
			});

		}elseif ($specimenStatusId > 0) {
		// todo: not being used right now
				$specimens = UnhlsSpecimen::where(function($q) use ($specimenStatusId)
				{
					$q->whereHas('specimenStatus', function($q) use ($specimenStatusId){
					    $q->where('specimen_status_id','=', $specimenStatusId);
					});
				});
		}elseif ($dateFrom||$dateTo) {
			$specimens = UnhlsSpecimen::where(function($q) use ($dateFrom, $dateTo)
			{
				if($dateFrom){
					$q->where('time_accepted', '>=', $dateFrom);
				}
				if($dateTo){
					$dateTo = $dateTo . ' 23:59:59';
					$q->where('time_accepted', '<=', $dateTo);
				}
			});
		}


		$specimens = $specimens->orderBy('time_accepted', 'DESC');

		return $specimens;
	}
}