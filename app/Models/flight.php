<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $tabel='flights';

    protected $fillable =  [

        'flight_no',
        'airline',
        'departure',
        'destination',
        'date',
        'departure_time',
        'gate',
        'status',
        'landing_time'

    ];
}