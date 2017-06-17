<?php

class Referral extends Eloquent 
{
    
    protected $table = 'referrals';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function facility()
    {
        return $this->belongsTo('UNHLSFacility','facility_from','id');
    }
}