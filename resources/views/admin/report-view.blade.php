<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background: #0f111a; color: white; margin: 0; display: flex; } /* Flex box add panni iruken */
        
        /* Sidebar Styling */
        .sidebar { width: 260px; height: 100vh; background: #161925; padding: 20px; border-right: 1px solid #2d3446; flex-shrink: 0; }
        .sidebar h4 { color: #fff; margin-bottom: 30px; font-size: 1.2rem; }
        .sidebar a { display: block; padding: 14px; color: #8898aa; text-decoration: none; border-radius: 12px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #00c2ff; color: #fff; }
        
        /* Main Content Styling */
        .main-content { flex-grow: 1; padding: 40px; }
        .glass-card { background: rgba(22, 25, 37, 0.8); backdrop-filter: blur(10px); padding: 30px; border-radius: 20px; border: 1px solid #2d3446; }
        .table { color: white; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4><i class="fa-solid fa-plane-up"></i> airport system</h4>
        <a href="/admin/dashboard"><i class="fa-solid fa-chart-line me-2"></i> Dashboard</a>
        <a href="/admin/flights"><i class="fa-solid fa-plane me-2"></i> Flights</a>
        <a href="/admin/passengers"><i class="fa-solid fa-users me-2"></i> Passengers</a>
        <a href="/admin/schedules"><i class="fa-solid fa-calendar me-2"></i> Schedules</a>
        <a href="/admin/reports" class="active"><i class="fa-solid fa-file-lines me-2"></i> Reports</a>
        <a href="/admin/support"><i class="fa-solid fa-envelope me-2"></i> Support Requests</a>
        <a href="/logout"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="glass-card">
            <h3>{{ $name }}</h3>
            <table class="table table-dark mt-4">
                <thead>
                    <tr><th>Name</th><th>Passport No</th><th>Flight No</th><th>Status</th></tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->passport_no }}</td>
                        <td>{{ $item->flight_no }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.reports.download', ['type'=>$type, 'from'=>$from, 'to'=>$to, 'name'=>$name]) }}" class="btn btn-success">Download PDF</a>
            <a href="/admin/reports" class="btn btn-secondary">Back</a>
        </div>
    </div>

</body>
</html>