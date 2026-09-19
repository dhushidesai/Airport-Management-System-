<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background: #0f111a; color: white; font-family: 'Segoe UI', sans-serif; margin: 0; }
        /* Sidebar Styles */
        .sidebar { width: 260px; height: 100vh; position: fixed; background: #161925; padding: 20px; border-right: 1px solid #2d3446; }
        .sidebar h4 { color: #fff; margin-bottom: 30px; font-size: 1.2rem; }
        .sidebar a { display: block; padding: 14px; color: #8898aa; text-decoration: none; border-radius: 12px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #00c2ff; color: #fff; }
        /* Main Content */
        .main-content { margin-left: 260px; padding: 40px; }
        .glass-card { background: rgba(22, 25, 37, 0.8); backdrop-filter: blur(10px); padding: 30px; border-radius: 20px; border: 1px solid #2d3446; }
        .form-control { background: #0f111a !important; border: 1px solid #2d3446 !important; color: white !important; }
    </style>
</head>
<body>

    <!-- Sidebar -->
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

    <!-- Content -->
    <div class="main-content">
        <div class="glass-card">
            <h2 class="mb-4">Generate Reports</h2>
            <form action="{{ route('admin.reports.generate') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label>Report Type</label>
                        <select name="report_type" class="form-control">
                            <option value="Flight Report">Flight Report</option>
                            <option value="Passenger Report">Passenger Report</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Report Name</label>
                        <input type="text" name="report_name" class="form-control" required>
                    </div>
                    <div class="col-md-6"><label>From</label><input type="date" name="from_date" class="form-control" required></div>
                    <div class="col-md-6"><label>To</label><input type="date" name="to_date" class="form-control" required></div>
                    <div class="col-12 mt-4"><button class="btn btn-primary w-100">Generate Report</button></div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>