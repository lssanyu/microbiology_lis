<?php

class ZoneDiameter extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    // todo: change this table name to zone_diameter_refs
    protected $table = 'zone_diameters';

    public $timestamps = false;

    // todo: use the same resource when seeding
    const SENSITIVE = 1;
    const INTERMEDIATE = 2;
    const RESISTANT = 3;

    /**
     * drug relationship
     */
    public function drug()
    {
      return $this->belongsTo('Drug');
    }

    /**
     * organism relationship
     */
    public function organism()
    {
      return $this->belongsTo('Organism');
    }

    /**
     * zone diameter interpretation
     */
    public function getZoneDiameterInterpretation($diameter)
    {
        if ($diameter <= $this->resistant_max) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::RESISTANT)->id;
        }elseif ($diameter >= $this->sensitive_min) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::SENSITIVE)->id;
        }elseif ($diameter >= $this->intermediate_min) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::INTERMEDIATE)->id;
        }elseif ($diameter <= $this->intermediate_max) {
            return DrugSusceptibilityMeasure::find(ZoneDiameter::INTERMEDIATE)->id;
        }else{
            /*todo: if the caller gets this reply tell the user the diameter is not valid,
            so they can insist problematic range, what do we do?
            ask user to configure, send message to the front
            return null;
            with a link to the place where to make changes, if you have rights
            */
        }
    }
}
