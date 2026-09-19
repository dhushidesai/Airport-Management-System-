<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Passenger;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    
    public function index() 
    {
        return view('admin.reports'); 
    }

    
    public function generate(Request $request) 
    {
        $type = $request->report_type;
        $from = $request->from_date;
        $to = $request->to_date;
        $name = $request->report_name;

       
        if ($type == 'Flight Report') {
            $data = Flight::whereBetween('date', [$from, $to])->get();
        } else {
            $data = Passenger::whereBetween('created_at', [$from, $to])->get();
        }

       
        return view('admin.report-view', compact('data', 'type', 'name', 'from', 'to'));
    }

   public function downloadPdf(Request $request) 
{
  
    if ($request->type == 'Flight Report') {
        $data = \App\Models\Flight::whereBetween('date', [$request->from, $request->to])->get();
    } else {
        $data = \App\Models\Passenger::whereBetween('created_at', [$request->from, $request->to])->get();
    }
    
    
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.report-pdf', [
        'data' => $data,
        'type' => $request->type,
        'name' => $request->name
    ]);
    
    return $pdf->download($request->name . '.pdf');
}
}