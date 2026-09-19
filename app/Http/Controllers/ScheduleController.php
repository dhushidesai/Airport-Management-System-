<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; 

class ScheduleController extends Controller
{
    public function index()
{
    
    $schedules = \App\Models\Schedule::all();
    $total = $schedules->count();
    $onTime = $schedules->where('status', 'On Time')->count();
    $delayed = $schedules->where('status', 'Delayed')->count();

    
    return view('admin.schedules', compact('schedules', 'total', 'onTime', 'delayed'));
}
    public function create()
    {
        return view('admin.add-schedule'); 
    }
public function store(Request $request)
{
    
    $departure = \Carbon\Carbon::createFromFormat('h:i A', $request->departure_time)->format('H:i:s');
    $arrival = \Carbon\Carbon::createFromFormat('h:i A', $request->arrival_time)->format('H:i:s');

    $data = $request->all();
    $data['departure_time'] = $departure;
    $data['arrival_time'] = $arrival;

    \App\Models\Schedule::create($data);

    return redirect('/admin/schedules')->with('success', 'Schedule added successfully!');
}
public function edit($id) {
    $schedule = \App\Models\Schedule::findOrFail($id);
    return view('admin.edit-schedule', compact('schedule'));
}

public function update(Request $request, $id) {
    $schedule = \App\Models\Schedule::findOrFail($id);
    $schedule->update($request->all());
    return redirect('/admin/schedules')->with('success', 'Updated!');
}

public function destroy($id) {
    \App\Models\Schedule::destroy($id);
    return redirect('/admin/schedules')->with('success', 'Deleted!');
}
}