<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Place;

class Sensor extends Model
{
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function measurement_types()
    {
        return $this->hasOne('App\MeasurementType');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'place_id', 'fisical_sensor_id', 'description', 'long_description', 'active', 'refresh_interval', 'measurement_type_id', 'h', 'r', 'distance'
     ];
}
