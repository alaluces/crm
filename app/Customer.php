<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';


  protected $fillable = [
    'id',
    'first_name',
    'last_name',
    'gender',
    'birth_date'
  ];

}
