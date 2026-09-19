<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   protected $fillable = ['flight_no', 'from_location', 'to_location', 'departure_time', 'arrival_time', 'gate', 'status'];
}
