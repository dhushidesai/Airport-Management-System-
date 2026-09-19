<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    body { background: #16181d; color: white; display: flex; font-family: sans-serif; }
    .sidebar { width: 250px; height: 100vh; background: #1f2530; padding: 30px; position: fixed; }
    .logo { color: white; font-weight: bold; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }
    .logo i { color: #007bff; }
    .sidebar a { display: block; color: #a1a1a1; text-decoration: none; padding: 16px 0; }
    .sidebar a:hover, .sidebar a.active { color: white; }
    .main { margin-left: 250px; width: 100%; padding: 30px; }
    .btn-add { background: #007bff; color: white; padding: 8px 20px; border-radius: 8px; text-decoration: none; }
    .search-input { background: #1f2530; border: 1px solid #333; color: white; padding: 10px; border-radius: 10px; width: 300px; margin-bottom: 30px; }
    
    .stat-card {
        background: #1f2530;
        padding: 15px;
        border-radius: 10px;
        border-left: 6px solid; 
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }
    
    table { width: 100%; color: white; background: #1f2530; border-radius: 15px; border-collapse: separate; border-spacing: 0; }
    th { color: #00c2ff; padding: 15px; border-bottom: 1px solid #333; }
    td { padding: 15px; border-bottom: 1px solid #333; }
</style>
</head>
<body>

<div class="sidebar">
    <div class="logo"><i class="fa-solid fa-plane"></i> <h4>airport system</h4></div>
    <a href="/admin/dashboard"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="/admin/flights"><i class="fa-solid fa-plane"></i> Flights</a>
    <a href="/admin/passengers"><i class="fa-solid fa-users"></i> Passengers</a>
    <a href="/admin/schedules" style="color:white;"><i class="fa-solid fa-calendar"></i> Schedules</a>
    <a href="/admin/reports"><i class="fa-solid fa-file-lines"></i> Reports</a>
    <a href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="main">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Schedule Management</h2>
        <a href="/admin/add-schedule" class="btn-add">+ Add Schedule</a>
    </div>
    <div class="row g-3">
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #3b82f6;">
            <div style="color: #3b82f6; font-size: 24px;"><i class="fa fa-calendar"></i></div>
            <div style="font-size: 28px; font-weight: bold; color: white;">{{ \App\Models\Schedule::count() }}</div>
            <div style="color: #9ca3af; font-size: 16px;">Total Schedules</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #10b981;">
            <div style="color: #10b981; font-size: 24px;"><i class="fa fa-check-circle"></i></div>
            <div style="font-size: 28px; font-weight: bold; color: white;">{{ \App\Models\Schedule::where('status', 'On Time')->count() }}</div>
            <div style="color: #9ca3af; font-size: 16px;">On Time</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #ef4444;">
            <div style="color: #ef4444; font-size: 24px;"><i class="fa fa-clock"></i></div>
            <div style="font-size: 28px; font-weight: bold; color: white;">{{ \App\Models\Schedule::where('status', 'Delayed')->count() }}</div>
            <div style="color: #9ca3af; font-size: 16px;">Delayed</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #f59e0b;">
            <div style="color: #f59e0b; font-size: 24px;"><i class="fa fa-plane-departure"></i></div>
            <div style="font-size: 28px; font-weight: bold; color: white;">{{ \App\Models\Schedule::where('status', 'Boarding')->count() }}</div>
            <div style="color: #9ca3af; font-size: 16px;">Boarding</div>
        </div>
    </div>
</div>
    

<br><br>
    

    <input type="text" id="searchInput" onkeyup="searchSchedule()" class="search-input" placeholder="Search Flight No...">

    <table>
        <thead>
            <tr>
                <th>Flight No</th><th>From</th><th>To</th><th>Departure</th><th>Arrival</th><th>Gate</th><th>Status</th><th>Action</th>
            </tr>
        </thead>
        <tbody id="scheduleTable">
            @if(isset($schedules) && count($schedules) > 0)
               @foreach($schedules as $s)
<tr>
    <td>{{ $s->flight_no }}</td>
    <td>{{ $s->from_location }}</td>
    <td>{{ $s->to_location }}</td>
    <td>{{ $s->departure_time }}</td>
    <td>{{ $s->arrival_time }}</td>
    <td>{{ $s->gate }}</td>
    
    <td>
        @if($s->status == 'On Time')
            <span style="background: rgba(40, 167, 69, 0.2); color: #28a745; padding: 5px 12px; border-radius: 20px; font-weight: bold;">On Time</span>
        @elseif($s->status == 'Delayed')
            <span style="background: rgba(220, 53, 69, 0.2); color: #dc3545; padding: 5px 12px; border-radius: 20px; font-weight: bold;">Delayed</span>
        @elseif($s->status == 'Boarding')
            <span style="background: rgba(255, 193, 7, 0.2); color: #ffc107; padding: 5px 12px; border-radius: 20px; font-weight: bold;">Boarding</span>
        @endif
    </td>
    
    <td>
       
        <a href="/admin/edit-schedule/{{ $s->id }}" class="text-primary me-2"><i class="fa-solid fa-pencil"></i></a>
        <a href="/admin/delete-schedule/{{ $s->id }}" class="text-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
    </td>
</tr>
@endforeach
            @else
                <tr><td colspan="8" class="text-center">No schedules found</td></tr>
            @endif
        </tbody>
    </table>
</div>

<script>
function searchSchedule() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let rows = document.getElementById("scheduleTable").getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        let flight = rows[i].getElementsByTagName("td")[0];
        if (flight) {
            rows[i].style.display = (flight.textContent.toUpperCase().indexOf(input) > -1) ? "" : "none";
        }
    }
}
</script>
</body>
</html>