<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #121212; color: #fff; font-family: sans-serif; }
        .sidebar { height: 100vh; background: #1f2229; width: 260px; position: fixed; padding-top: 20px; box-shadow: 2px 0 10px rgba(0,0,0,0.3); }
        .sidebar-header { color: #2ecc71; padding: 0 20px 20px 20px; font-weight: bold; font-size: 1.1rem; }
        .sidebar a { color: #bdc3c7; padding: 15px 20px; display: block; text-decoration: none; }
        .sidebar a:hover, .sidebar a.active { background: #273849; color: #ffffff; border-left: 4px solid #2ecc71; }
        .main-content { margin-left: 260px; padding: 50px; }
        .card-unique { background: #1f2229; border: 1px solid #333; padding: 40px; border-radius: 20px; margin-bottom: 30px; }
        .form-control { background: #121212 !important; border: 1px solid #333 !important; color: #fff !important; padding: 15px; border-radius: 12px; }
        .btn-custom { background: #2ecc71; color: #121212; padding: 12px 30px; border-radius: 12px; font-weight: bold; border: none; }
        
        /* Table Styling */
        .table { color: #fff; margin-top: 20px; }
        .table thead { background: #273849; color: #2ecc71; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header"><i class="fa fa-plane"></i> AIRPORT SYSTEM</div>
        <a href="{{ route('passenger.dashboard') }}"><i class="fa fa-home"></i> Dashboard</a>
        <a href="{{ route('passenger.profile') }}"><i class="fa fa-user"></i> My Profile</a>
        <a href="{{ route('passenger.flight-finder') }}"><i class="fa fa-search"></i> Flight Finder</a>
        <a href="{{ route('passenger.flight-schedule') }}"><i class="fa fa-calendar"></i> Flight Schedule</a>
        <a href="{{ route('passenger.notifications') }}"><i class="fa fa-bell"></i> Notifications</a>
        <a href="{{ route('passenger.help') }}" class="active"><i class="fa fa-question-circle"></i> Help & Support</a>
        <a href="/logout" style="margin-top: 50px;"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="card-unique">
            <h2 class="mb-3"><i class="fa fa-headset text-success"></i> Support Desk</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <form action="{{ route('passenger.help.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Your Subject</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label>Your Message</label>
                    <textarea name="message" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn-custom">Submit Request</button>
            </form>
        </div>

        <div class="card-unique">
            <h4><i class="fa fa-history text-info"></i> Your Requests</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Admin Reply</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($supports as $support)
                    <tr>
                        <td>{{ $support->created_at->format('d-m-Y') }}</td>
                        <td>{{ $support->subject }}</td>
                        <td>{{ $support->message }}</td>
                        <td>
                            @if($support->reply)
                                <span class="badge bg-success">{{ $support->reply }}</span>
                            @else
                                <span class="text-warning">Pending...</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center">No requests found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>