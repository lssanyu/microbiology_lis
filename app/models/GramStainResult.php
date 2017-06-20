<?php

class GramStainResult extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gram_stain_results';

    public $timestamps = false;

    /**
     * drug relationship
     */
    public function test()
    {
      return $this->belongsTo('UnhlsTest','test_id','id');
    }

    /**
     * organism relationship
     */
    public function measureRange()
    {
      return $this->belongsTo('MeasureRange','measure_range_id','id');
    }
}
