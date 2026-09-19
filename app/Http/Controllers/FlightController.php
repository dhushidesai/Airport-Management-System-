<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Passenger;
use App\Notifications\GeneralFlightNotification;


class FlightController extends Controller
{

public function index()
{
    $flights = \App\Models\Flight::all();

    $total = $flights->count();
    $delayed = $flights->where('status', 'Delayed')->count();
    $boarding = $flights->where('status', 'Boarding')->count();
    $onTime = $flights->where('status', 'On Time')->count();

    return view('admin.flights', compact('flights', 'total', 'delayed', 'boarding', 'onTime'));
}

public function store(Request $request)
{

Flight::create([

'flight_no' => $request->flight_no,

'airline' => $request->airline,

'departure' => $request->departure,

'destination' => $request->destination,

'date' => $request->date,

'departure_time' => $request->departure_time,

'gate' => $request->gate,

'status' => $request->status

]);

return redirect('/admin/flights');

}

public function edit($id)
{

$flight = Flight::find($id);

return view('admin.edit-flight',
compact('flight'));

}

public function update(Request $request, $id)
{

$flight = Flight::find($id);

$flight->update([

'flight_no' => $request->flight_no,

'airline' => $request->airline,

'departure' => $request->departure,

'destination' => $request->destination,

'date' => $request->date,

'departure_time' => $request->departure_time ?: $flight->departure_time,

'gate' => $request->gate,

'status' => $request->status,

  'landing_time' => $request->landing_time, 



]);

return redirect('/admin/flights');
}

public function delete($id)
{

$flight = Flight::find($id);

$flight->delete();

return redirect('/admin/flights');

}

public function updateFlightStatus(Request $request, $id)
{
    $flight = \App\Models\Flight::find($id);
    $flight->status = $request->status;
    $flight->save();

    
    $passengers = Passenger::where('flight_id', $id)->get();
    
    foreach ($passengers as $passenger) {
        $passenger->notify(new GeneralFlightNotification(
            "Flight" . $flight->flight_no . " இன் நிலை இப்போது: " . $request->status, 
            "info"
        ));
    }

    return redirect()->back()->with('success', 'Details send successfully!');
}
}