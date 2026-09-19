<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Dark Theme Background */
        body { background-color: #121212; color: #e0e0e0; font-family: sans-serif; }
        
        /* Sidebar (Matching your Dashboard UI) */
        .sidebar { height: 100vh; background: #1f2229; width: 260px; position: fixed; padding-top: 20px; box-shadow: 2px 0 10px rgba(0,0,0,0.3); }
        .sidebar-header { color: #2ecc71; padding: 0 20px 20px 20px; font-weight: bold; font-size: 1.1rem; display: flex; align-items: center; }
        .sidebar-header i { margin-right: 10px; }
        .sidebar a { color: #bdc3c7; padding: 15px 20px; display: block; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover { background: #273849; color: #ffffff; }
        .sidebar a.active { background: #2b3c4d; color: #ffffff; border-left: 4px solid #2ecc71; }
        
        /* Content Area */
        .main-content { margin-left: 260px; padding: 40px; }
        .dark-card { background: #1f2229; border: 1px solid #333; padding: 25px; border-radius: 10px; margin-bottom: 20px; }
        .text-green { color: #2ecc71; }
        .text-blue { color: #3498db; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header"><i class="fa fa-plane"></i> AIRPORT SYSTEM</div>
        <a href="/passenger/dashboard"><i class="fa fa-home"></i> Dashboard</a>
        <a href="/passenger/profile"><i class="fa fa-user"></i> My Profile</a>
        <a href="/passenger/flight-finder"><i class="fa fa-search"></i> Flight Finder</a>
        <a href="/passenger/flight-schedule"><i class="fa fa-calendar"></i> Flight Schedule</a>
        <a href="/passenger/notifications" class="active"><i class="fa fa-bell"></i> Notifications</a>
        <a href="/passenger/help"><i class="fa fa-question-circle"></i> Help & Support</a>
        <a href="/logout" class="logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h3 class="mb-4">📢 Passenger Notification Center</h3>

        <!-- Booking Status -->
        <div class="dark-card">
            <h5 class="text-green">✅ Your Booking Status</h5>
            <p class="mt-2">Hello <strong>{{ $passenger->name }}</strong>, your current status is: 
               <span class="badge bg-success">{{ $passenger->status }}</span>
            </p>
        </div>

        <!-- Flight Information -->
        <div class="dark-card">
            <h5 class="text-blue">✈️ Your Flight Information</h5>
            <div class="row mt-3">
                <div class="col-md-4">
                    <p>Flight Number: <strong>{{ $passenger->flight_no }}</strong></p>
                </div>
                <div class="col-md-4">
                    <p>Destination: <strong>{{ $passenger->destination }}</strong></p>
                </div>
                <div class="col-md-4">
                    <p>Flight Status: <strong class="text-warning">{{ $flight->status ?? 'On Time' }}</strong></p>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#flightDetailsModal">
            <i class="fas fa-info-circle"></i> View Landing Details
        </button>
    </div>

    <!-- Modal remains the same -->
    <div class="modal fade" id="flightDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #1f2229; color: #ffffff; border: 1px solid #334155;">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-info"><i class="fas fa-plane"></i> Flight Detailed View</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover table-bordered text-center">
                            <thead>
                                <tr class="text-warning">
                                    <th>Flight No</th>
                                    <th>Date</th>
                                    <th>Departure</th>
                                    <th>Landing Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $passenger->flight_no }}</td>
                                    <td>{{ $flight->date ?? 'N/A' }}</td>
                                    <td>{{ $flight->departure_time }}</td>
                                    <td class="text-info">{{ $flight->landing_time ?? 'TBA' }}</td>
                                    <td>
                                        @if($flight->status == 'Delayed')
                                            <span class="badge bg-danger">Delayed</span>
                                        @elseif($flight->status == 'Boarding')
                                            <span class="badge bg-primary">Boarding</span>
                                        @else
                                            <span class="badge bg-success">On Time</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>