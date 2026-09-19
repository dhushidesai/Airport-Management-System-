<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- SweetAlert2 CSS & JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #fff; display: flex; }
        
        .sidebar { width: 260px; background: #1e293b; height: 100vh; position: fixed; border-right: 1px solid #334155; display: flex; flex-direction: column; }
        .logo-box { padding: 30px; text-align: center; color: #22c55e; font-size: 1.2rem; font-weight: bold; border-bottom: 1px solid #334155; }
        .sidebar a { display: block; color: #94a3b8; padding: 18px 25px; text-decoration: none; font-size: 16px; transition: 0.2s; }
        .sidebar a:hover { background: #334155; color: #fff; border-left: 5px solid #22c55e; }
        .sidebar .logout { margin-top: auto; color: #ef4444; border-top: 1px solid #334155; }
        
        .main { margin-left: 260px; padding: 40px; width: calc(100% - 260px); }
        .welcome-header { margin-bottom: 10px; }
        
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap:40px; margin-bottom: 40px; }
        .stat-card { background: #1e293b; padding: 30px; border-radius: 10px; border: 1px solid #334155; text-align: center; }
        .stat-card h3 { font-size: 2.2rem; color: #22c55e; margin: 10px 0 0 0; }
        .stat-card p { color: #94a3b8; margin: 5px 0; font-size: 0.9rem; }
        
        .table-box { background: #1e293b; padding: 30px; border-radius: 15px; border: 1px solid #334155; margin-top:20px; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; color: #94a3b8; padding: 20px; border-bottom: 1px solid #334155; }
        td { padding: 20px; border-bottom: 1px solid #334155; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-box"><i class="fa fa-plane"></i> AIRPORT SYSTEM</div>
        <a href="{{ route('passenger.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
        <a href="{{ route('passenger.profile') }}"><i class="fa fa-user"></i> My Profile</a>
        <a href="{{ route('passenger.flight-finder') }}"><i class="fa fa-plane"></i> Flight Finder</a>
        <a href="{{ route('passenger.flight-schedule') }}"><i class="fa fa-calendar"></i> Flight Schedule</a>
        <a href="{{ route('passenger.notifications') }}"><i class="fa fa-bell"></i> Notifications</a>
        <a href="{{ route('passenger.help') }}"><i class="fa fa-question-circle"></i> Help & Support</a>
        <a href="/logout" class="logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <div class="main">
        <div class="welcome-header">
           <h1>Welcome, {{ $passenger->name }}!</h1>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <i class="fa fa-plane fa-2x" style="color: #22c55e;"></i>
                <h3>{{ $upcomingFlights->count() }}</h3>
                <p>Upcoming Flights</p>
            </div>
            <div class="stat-card">
                <i class="fa fa-bookmark fa-2x" style="color: #3b82f6;"></i>
                <h3>{{ $myBookings }}</h3>
                <p>My Bookings</p>
            </div>
            <div class="stat-card">
                 <i class="fa fa-bell fa-2x" style="color: #eab308;"></i>
                <h3>{{ $notifications ?? 1}}</h3>
                <p>Notifications</p>
</div>
        </div>

        <div class="table-box">
            <h3>My Upcoming Flights</h3>
            <table>
                <thead>
                    <tr>
                        <th>Flight No</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Gate</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($upcomingFlights as $flight)
                    <tr>
                        <td>{{ $flight->flight_no }}</td>
                        <td>{{ $flight->departure }}</td>
                        <td>{{ $flight->destination }}</td>
                        <td>{{ $flight->date }}</td>
                        <td>{{ $flight->departure_time }}</td>
                        <td>{{ $flight->gate }}</td>
                        <td style="font-weight:bold;">{{ $flight->status }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="7" style="text-align: center;">No flight details found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Laravel-il irundhu data-vai JS-ku convert pandrom
            const flights = @json($upcomingFlights);

            flights.forEach(flight => {
                const status = flight.status ? flight.status.toLowerCase().trim() : '';
                
                // 1. Delayed Status
                if (status === 'delayed') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Flight Delayed',
                        html: `Flight <strong>${flight.flight_no}</strong> is currently delayed. <br>Sorry for the inconvenience.`,
                        background: '#1e293b',
                        color: '#fff',
                        confirmButtonColor: '#ef4444'
                    });
                } 
                // 2. Boarding Status
                else if (status === 'boarding') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Boarding Started!',
                        html: `Flight <strong>${flight.flight_no}</strong> is boarding now! <br>Please proceed to <strong>Gate ${flight.gate}</strong> immediately.`,
                        background: '#1e293b',
                        color: '#fff',
                        confirmButtonColor: '#3b82f6'
                    });
                } 
                // 3. On Time Status
                else if (status === 'on time') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Flight On Time',
                        html: `Great news! Your flight <strong>${flight.flight_no}</strong> is on schedule. <br>Safe travels!`,
                        background: '#1e293b',
                        color: '#fff',
                        confirmButtonColor: '#22c55e'
                    });
                }
            });
        });
    </script>
</body>
</html>