<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;


class PassengerController extends Controller
{

    public function index()
    {

        $passengers = Passenger::all();

        return view('admin.passengers', ['passengers' => $passengers]);

    }
    public function create()
    {
        return view('admin.add-passenger');
    }


    public function store(Request $request)
    {

        Passenger::create([
            
        'name' => $request->name,
        
        'passport_no' => $request->passport_no,

        'flight_no' => $request->flight_no,

        'destination' => $request->destination,

        'email' => $request->email,

        'status' => $request->status,

        'password' => null, 

        ]);
         return redirect('/admin/passengers')->with('success', 'Passenger added successfully!');
    }

       public function edit($id)
{

    $passenger = Passenger::find($id);

    return view('admin.edit-passenger',compact('passenger'));

}

public function update(Request $request, $id)
{
    $passenger = Passenger::find($id);

    
    $passenger->update([
        'name' => $request->name,
        'passport_no' => $request->passport_no,
        'flight_no' => $request->flight_no,
        'destination' => $request->destination,
        'email' => $request->email,
        'status' => $request->status,
    ]);

    return redirect('/admin/passengers')->with('success', 'Passenger updated successfully!');
}

public function delete($id)
{

    $passenger = Passenger::find($id);

    $passenger->delete();

    return redirect('/admin/passengers');

}
  public function dashboard()
    {
        
        $passenger = Auth::guard('passenger')->user();
        $flights = Flight::all();
        return view('passenger.dashboard', compact('passenger', 'flights'));
    }


}