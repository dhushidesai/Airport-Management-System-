<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
protected $fillable = ['subject', 'message', 'user_name','reply']; 
   
}