<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{
    public function alarm_users()
    {
        return $this->belongsToMany('App\User', 'alarm_users');
    }

    public function sensor()
    {
        return $this->hasOne('App\Sensor', 'id', 'sensor_id');
    }

    protected $fillable = [
      'name',
      'sensor_id',
      'alarm_type',
      'value',
      'user_id'
    ];
}
