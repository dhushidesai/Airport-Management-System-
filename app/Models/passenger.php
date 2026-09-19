<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{

protected $fillable = ['name', 'passport_no', 'flight_no', 'destination', 'email', 'status', 'password', ];

}