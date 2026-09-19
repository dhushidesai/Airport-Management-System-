<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;

class ProfileController extends Controller
{
    public function edit()
    {
       
        $passengerId = session('passenger_id');
        
        
        if (!$passengerId) {
            return redirect('/login')->with('error', 'Please Login First.');
        }

        
        $passenger = Passenger::find($passengerId);

        return view('passenger.edit-profile', compact('passenger'));
    }

    public function update(Request $request)
    {
        $passengerId = session('passenger_id');
        $passenger = Passenger::find($passengerId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:passengers,email,' . $passenger->id,
            'passport_no' => 'required|string|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $imageName);
            $passenger->avatar = $imageName;
        }

        $passenger->update([
            'name' => $request->name,
            'email' => $request->email,
            'passport_no' => $request->passport_no,
        ]);

        session(['passenger_name' => $request->name]);

        return redirect('/passenger/profile')->with('success', 'Profile updated!');
    }
}