<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementType extends Model
{
    public function measurement_units()
    {
        return $this->belongsTo('App\MeasurementUnit', 'measurement_unit_id');
    }
}
