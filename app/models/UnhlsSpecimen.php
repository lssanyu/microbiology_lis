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
	 * Enabling soft deletes for specimen details.
	 *
	 * @var boolean
	 */
	// protected $softDelete = true;//it wants deleted at fills,

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
        if($this->specimen_status_id == UnhlsSpecimen::REJECTED)
        {
            return true;
        }
        else {
            return false;
        }
    }

}