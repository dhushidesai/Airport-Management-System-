<?php

namespace App\Http\Controllers;

use App\Models\Flight;

class DashboardController extends Controller
{

public function index()
{

$totalFlights =Flight::count();

return view('admin.dashboard',compact('totalFlights'));

}


}