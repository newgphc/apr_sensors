<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    public function measurement_types()
    {
        return $this->hasMany('App\MeasurementType');
    }
}
