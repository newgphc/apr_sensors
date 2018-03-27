<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function sensors()
    {
        return $this->hasMany('App\Sensor');
    }

    protected $fillable = [
        'name', 'description', 'customer_id'
    ];
}
