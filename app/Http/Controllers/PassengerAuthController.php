<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\PassengerAuth;
use Illuminate\Support\Facades\Hash;
use App\Models\Booking;
use App\Models\Notification;
use App\Model\Flight;

class PassengerAuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('passenger.login');
    }
  
public function login(Request $request)
{
    
    $passenger = Passenger::where('email', $request->email)->first();

    if ($passenger) {
        
      
        if (empty($passenger->password)) {
            $passenger->password = Hash::make($request->password); 
            $passenger->save();
            
            session(['passenger_id' => $passenger->id, 'passenger_name' => $passenger->name]);
            return redirect('/passenger/dashboard');
        } 
       
        
        elseif (Hash::check($request->password, $passenger->password)) {
            session(['passenger_id' => $passenger->id, 'passenger_name' => $passenger->name]);
            return redirect('/passenger/dashboard');
        } else {
            return back()->withErrors(['error' => 'Wrong password!']);
        }
    }
    return back()->withErrors(['error' => 'Passenger not found!']);
}
public function dashboard() 
{
    
    $passengerId = session('passenger_id');
    $passenger = \App\Models\Passenger::find($passengerId);
    
    if (!$passenger) {
        return redirect('/passenger/login');
    }

    $upcomingFlights = \App\Models\Flight::where('flight_no', $passenger->flight_no)
                                         ->where('destination', $passenger->destination) 
                                         ->get();
    
   
    $myBookings = \App\Models\Booking::where('passenger_id', $passengerId)->count();
    
    $notifications = $passenger->unreadNotifications;

    
    return view('passenger.dashboard', compact('passenger', 'upcomingFlights', 'myBookings', 'notifications'));
}
public function schedule(Request $request) 
{
    $passenger = \App\Models\Passenger::find(session('passenger_id'));
    $destination = $passenger->destination;
    $today = date('Y-m-d'); // 2026-06-29

  
    $allFlights = \App\Models\Flight::where('destination', $destination)
                                     ->where('date', '>=', $today)
                                     ->orderBy('date', 'asc')
                                     ->limit(1) 
                                     ->get();

    $futureFlights = [];
    $noFutureFlights = false;

    if ($request->has('show_updates')) {
    
        $futureFlights = \App\Models\Flight::where('destination', $destination)
                                          ->where('date', '>', $today) 
                                          ->orderBy('date', 'asc')
                                          ->get();
        
        if ($futureFlights->isEmpty()) {
            $noFutureFlights = true;
        }
    }

    return view('passenger.flight-schedule', compact('allFlights', 'futureFlights', 'noFutureFlights', 'destination'));
}
public function profile()
{
    $passenger = \App\Models\Passenger::find(session('passenger_id'));
    return view('passenger.profile', compact('passenger'));
}
public function showFinder()
{
    
    $airports = \App\Models\Flight::distinct()->pluck('departure');
    $countries = \App\Models\Flight::distinct()->pluck('destination');

    return view('passenger.flight-finder', compact('airports', 'countries'));
}

public function findFlights(Request $request)
{
  
    $results = \App\Models\Flight::where('departure', $request->from)
                                 ->where('destination', $request->to)
                                 ->get();

  
    $airports = \App\Models\Flight::distinct()->pluck('departure');
    $countries = \App\Models\Flight::distinct()->pluck('destination');

    return view('passenger.flight-finder', compact('results', 'airports', 'countries'));
}

public function notifications()
{
    
    $passengerId = session('passenger_id');
    
   
    $passenger = \App\Models\Passenger::find($passengerId);

   
    $flight = \App\Models\Flight::where('flight_no', $passenger->flight_no)->first();

    return view('passenger.notifications', compact('passenger', 'flight'));
}

public function showHelp() 
{
    $name = session('passenger_name');

    
    $supports = \App\Models\Support::where('user_name', 'LIKE', $name)
                    ->latest()
                    ->get();
    
    return view('passenger.help', compact('supports'));
}
public function submitHelp(Request $request) 
{
   
    $passengerName = session('passenger_name');

    
    if (!$passengerName && session()->has('passenger_id')) {
        $passenger = \App\Models\Passenger::find(session('passenger_id'));
        $passengerName = $passenger ? $passenger->name : 'Anonymous';
    }

    
    \App\Models\Support::create([
        'subject' => $request->subject,
        'message' => $request->message,
        'user_name' => $passengerName ?? 'Anonymous', 
    ]);

    return back()->with('success', 'Request sent!');
}

}