<?php

class GramStainRange extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gram_stain_ranges';

    public $timestamps = false;

    /**
     * gram stain result relationship
     */
    public function gramStainResult()
    {
      return $this->hasMany('GramStainResults');
    }
}
