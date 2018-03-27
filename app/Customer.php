<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
      'rut', 'name', 'mail', 'address', 'contact_name', 'phone_1', 'phone_2' 
  ];
}
