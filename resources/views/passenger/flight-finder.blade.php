<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight Finder | Airport System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        body { font-family: 'Poppins', sans-serif; background: #0b1120; color: #fff; margin: 0; display: flex; }

        .sidebar { width: 220px; background: #111827; height: 100vh; padding: 20px; position: fixed; }
        .logo-box { color: #22c55e; margin-bottom: 30px; font-weight: 600; font-size: 1rem; }
        .sidebar a { color: #94a3b8; display: flex; align-items: center; padding: 20px 0; text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
        .sidebar a i { margin-right: 14px; width: 20px; }
        .sidebar a.active { color: #fff; }
        .sidebar a:hover { color: #22c55e; }

        .main-content { margin-left: 240px; padding: 30px; width: 100%; }
        
        .search-card { background: #1e293b; padding: 25px; border-radius: 12px; }
        .form-row { display: flex; gap: 20px; align-items: flex-end; }
        .form-group { flex: 1; } 
        label { font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; margin-bottom: 8px; display: block; }
        
        .custom-input { background: #0f172a !important; color: white !important; border: 1px solid #334155 !important; height: 45px !important; border-radius: 6px !important; width: 100%; padding: 0 15px !important; }
        .btn-search { background: #22c55e; color: #000; border: none; padding: 0 20px; height: 45px; border-radius: 6px; font-weight: 600; cursor: pointer; }
        
        /* Table Style */
        .table-container { margin-top: 30px; background: #1e293b; border-radius: 12px; padding: 20px; }
        table { width: 100%; border-collapse: collapse; color: #fff; }
        th { text-align: left; padding: 15px; color: #94a3b8; border-bottom: 1px solid #334155; }
        td { padding: 15px; border-bottom: 1px solid #334155; }
        
        .select2-container .select2-selection--single { height: 45px !important; background: #0f172a !important; border: 1px solid #334155 !important; border-radius: 6px !important; }
        .select2-container--default .select2-selection--single .select2-selection__rendered { color: white !important; line-height: 45px !important; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-box"><i class="fa fa-plane"></i> AIRPORT SYSTEM</div>
        <a href="{{ route('passenger.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
        <a href="{{ route('passenger.profile') }}"><i class="fa fa-user"></i> My Profile</a>
        <a href="{{ route('passenger.flight-finder') }}" class="active"><i class="fa fa-plane"></i> Flight Finder</a>
        <a href="{{ route('passenger.flight-schedule') }}"><i class="fa fa-calendar"></i> Flight Schedule</a>
        <a href="{{ route('passenger.notifications') }}"><i class="fa fa-bell"></i> Notifications</a>
        <a href="{{ route('passenger.help') }}"><i class="fa fa-question-circle"></i> Help & Support</a>
        <a href="/logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <h2 style="margin-bottom: 30px;">Flight Finder</h2>
        <div class="search-card">
            <form action="{{ route('passenger.flight-finder.search') }}" method="GET" class="form-row">
                <div class="form-group">
                    <label>FROM (AIRPORT)</label>
                    <input list="airports" name="from" class="custom-input" placeholder="Select Airport..." required>
                    <datalist id="airports">
                        @foreach($airports as $ap) <option value="{{ $ap }}"> @endforeach
                    </datalist>
                </div>
                <div class="form-group">
                    <label>TO (DESTINATION)</label>
                    <select name="to" id="countrySelect" class="custom-input" required>
                        <option value="">Select Destination...</option>
                        @foreach($countries as $ct) <option value="{{ $ct }}">{{ $ct }}</option> @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-search"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>

        @if(isset($results))
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Flight No</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $f)
                    <tr>
                        <td>{{ $f->flight_no }}</td>
                        <td>{{ $f->departure }}</td>
                        <td>{{ $f->destination }}</td>
                        <td>{{ $f->departure_time }}</td>
                        <td style="color: #22c55e;">{{ $f->status }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="text-align:center;">No flights found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script> $(document).ready(function() { $('#countrySelect').select2({ width: '100%' }); }); </script>
</body>
</html>