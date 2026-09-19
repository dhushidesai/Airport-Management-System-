<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PassengerAuth extends Authenticatable
{
    use Notifiable;

   
    protected $table = 'passengers';

  
    protected $fillable = [
      'name',
      'email',
      'passport_no',
      'password',
    ];

}
  