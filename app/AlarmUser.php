<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlarmUser extends Model
{
    protected $fillable = [
      'alarm_id',
      'user_id'
    ];
}
