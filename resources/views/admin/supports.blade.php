<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Support Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #0b1120; color: #ffffff; font-family: 'Segoe UI', sans-serif; margin: 0; display: flex; }
        .sidebar { width: 260px; background-color: #111827; height: 100vh; padding: 20px; position: fixed; }
        .sidebar h4 { color: #38bdf8; margin-bottom: 30px; font-weight: bold; text-transform: uppercase; }
        .sidebar a { color: #94a3b8; text-decoration: none; display: block; padding: 12px 15px; border-radius: 8px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: #1e293b; color: #ffffff; }
        .main-content { margin-left: 260px; padding: 40px; width: 100%; }
        .card { background-color: #1e293b; border: none; border-radius: 15px; padding: 20px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3); }
        .table { color: #e2e8f0; }
        .table thead { color: #38bdf8; border-bottom: 2px solid #334155; }
        .btn-send { background-color: #22c55e; color: white; border: none; padding: 5px 15px; border-radius: 5px; font-weight: bold; }
        .btn-send:hover { background-color: #16a34a; }
        .form-control-sm { background: #0b1120; border: 1px solid #334155; color: white; }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>airport system</h4>
    <a href="/admin/dashboard">Dashboard</a>
    <a href="#">Flights</a>
    <a href="#">Passengers</a>
    <a href="#" class="active">Support Requests</a>
    <a href="/logout" class="text-danger">Logout</a>
</div>

<div class="main-content">
    <h2 class="mb-4">Support Requests</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Passenger</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action/Reply</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($supports as $support)
                    <tr>
                        <td>{{ $support->created_at->format('d-m-Y H:i') }}</td>
                        <td class="fw-bold">{{ $support->user_name ?? 'Anonymous' }}</td>
                        <td class="text-info">{{ $support->subject }}</td>
                        <td>{{ $support->message }}</td>
                        <td>
                            @if($support->reply)
                                <div class="text-success small"><strong>Replied:</strong> {{ $support->reply }}</div>
                            @else
                                <form action="{{ route('admin.support.reply', $support->id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <input type="text" name="reply" class="form-control form-control-sm" placeholder="Type response..." required>
                                    <button type="submit" class="btn-send">Send</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted">No requests found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>