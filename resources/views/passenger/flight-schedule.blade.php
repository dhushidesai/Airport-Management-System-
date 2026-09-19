<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #fff; display: flex; }
        .sidebar { width: 260px; background: #1e293b; height: 100vh; position: fixed; border-right: 1px solid #334155; }
        .logo-box { padding: 30px; text-align: center; color: #22c55e; font-size: 1.2rem; font-weight: bold; border-bottom: 1px solid #334155; }
        .sidebar a { display: block; color: #94a3b8; padding: 18px 25px; text-decoration: none; }
        .sidebar a:hover { background: #334155; color: #fff; border-left: 5px solid #22c55e; }
        .main { margin-left: 260px; padding: 40px; width: 100%; }
        .table-box { background: #1e293b; padding: 30px; border-radius: 15px; border: 1px solid #334155; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; color: white; }
        th { text-align: left; color: #94a3b8; padding: 20px; border-bottom: 1px solid #334155; }
        td { padding: 20px; border-bottom: 1px solid #334155; }
        .btn-future { background:#22c55e; padding:12px 25px; color:white; border-radius:8px; text-decoration:none; display:inline-block; }
    </style>
</head>
<body>
   <div class="row">
    <div class="col-md-4 sidebar">
        <div class="logo-box"><i class="fa fa-plane"></i> AIRPORT SYSTEM</div>
        <a href="{{ route('passenger.dashboard') }}?page=home"><i class="fa fa-home"></i> Dashboard</a>
        <a href="{{ route('passenger.profile') }}?page=profile"><i class="fa fa-user"></i> My Profile</a>
        <a href="{{ route('passenger.flight-finder') }}"><i class="fa fa-search"></i> Flight Finder</a>
        <a href="{{ route('passenger.flight-schedule') }}"><i class="fa fa-calendar"></i> Flight Schedule</a>
        <a href="{{ route('passenger.notifications') }}?page=notifications"><i class="fa fa-bell"></i> Notifications</a>
        <a href="{{ route('passenger.dashboard') }}?page=help"><i class="fa fa-question-circle"></i> Help & Support</a>
        <a href="/logout" class="logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="main">
        <h1>Flight Schedule</h1>
        
        
        <div class="table-box">
            <h3>Flights to {{ $destination }} (Today)</h3>
            <table>
                <thead>
                    <tr><th>Flight No</th><th>From</th><th>To</th><th>Date</th><th>Time</th><th>Status</th></tr>
                </thead>
                <tbody>
                    @forelse($allFlights as $flight)
                        <tr>
                            <td>{{ $flight->flight_no }}</td>
                            <td>{{ $flight->departure }}</td>
                            <td>{{ $flight->destination }}</td>
                            <td>{{ $flight->date }}</td>
                            <td>{{ $flight->departure_time }}</td>
                            <td>{{ $flight->status }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" style="text-align:center;">No flights found for today.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

      
        <a href="{{ route('passenger.flight-schedule') }}?show_updates=true" class="btn-future">
            <i class="fa fa-sync"></i> Future Updates
        </a>

       
        @if(request()->has('show_updates'))
            <div style="margin-top: 30px;">
                <h4 style="color: #22c55e; font-size: 1.5rem; margin-bottom: 20px;">🚀 Upcoming Future Flight Details</h4>
                
                @if($noFutureFlights)
                    <div style="padding: 20px; background: #991b1b; color: white; border-radius: 10px;">
                        ⚠️ No future flights scheduled for this destination.
                    </div>
                @else
                    @foreach($futureFlights as $flight)
                        <div style="background: #1e293b; padding: 20px; margin-bottom: 15px; border-radius: 10px; border-left: 5px solid #38bdf8;">
                            <strong>Flight: {{ $flight->flight_no }}</strong> | Date: {{ $flight->date }} | Time: {{ $flight->departure_time }}
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</body>
</html>