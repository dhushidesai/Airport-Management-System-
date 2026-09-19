<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #fff; display: flex; }
        
        /* Sidebar */
        .sidebar { width: 260px; background: #1e293b; height: 100vh; position: fixed; border-right: 1px solid #334155; }
        .logo-box { padding: 30px; text-align: center; color: #22c55e; font-size: 1.2rem; font-weight: bold; border-bottom: 1px solid #334155; }
        .sidebar a { display: block; color: #94a3b8; padding: 18px 25px; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #334155; color: #fff; border-left: 5px solid #22c55e; }
        .logout { margin-top: auto; color: #ef4444; border-top: 1px solid #334155; }

        /* Main Content */
        .main { margin-left: 260px; padding: 40px; width: calc(100% - 260px); display: flex; justify-content: center; }
        
        /* Premium Card */
        .profile-card { background: #1e293b; padding: 40px; border-radius: 25px; width: 550px; border: 1px solid #334155; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .profile-header { display: flex; align-items: center; gap: 20px; margin-bottom: 30px; border-bottom: 1px solid #334155; padding-bottom: 20px; }
        .profile-img { font-size: 50px; color: #3b82f6; background: #0f172a; padding: 20px; border-radius: 50%; border: 2px solid #3b82f6; }
        .badge { background: #eab308; color: #000; padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; margin-top: 5px; display: inline-block; }
        
        .info-grid { display: grid; gap: 20px; }
        .info-group { background: #0f172a; padding: 15px; border-radius: 12px; border: 1px solid #334155; }
        .info-group label { color: #94a3b8; font-size: 0.8rem; display: block; margin-bottom: 5px; }
        .info-group p { color: #fff; font-size: 1.1rem; margin: 0; font-weight: 600; }
    .btn-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }
    
    
    .btn-custom {
        padding: 12px 30px;
        border-radius: 50px; 
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: 0.3s;
        border: none;
        cursor: pointer;
        display: inline-block;
        text-align: center;
    }

   
    .btn-edit {
        background: #22c55e;
        color: white;
    }

    
    .btn-back {
        background: #3b82f6; 
        color: white;
    }

    .btn-custom:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }
        
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
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-img"><i class="fa fa-user"></i></div>
                <div>
                    <h2>{{ $passenger->name }}</h2>
                    <span class="badge"><i class="fa fa-crown"></i> Premium Member</span>
                </div>
            </div>
            
            <div class="info-grid">
                <div class="info-group">
                    <label>Email Address</label>
                    <p>{{ $passenger->email }}</p>
                </div>
                <div class="info-group">
                    <label>Passport No</label>
                    <p>{{ $passenger->passport_no }}</p>
                </div>
                <div class="info-group">
                    <label>Flight No</label>
                    <p>{{ $passenger->flight_no ?? 'N/A' }}</p>
                </div>
                <div class="info-group">
                    <label>Destination</label>
                    <p>{{ $passenger->destination }}</p>
                </div>
            </div>
            <div class="btn-container">

    <a href="{{ route('passenger.dashboard') }}" class="btn-custom btn-back">
        Back to Dashboard
    </a>

  
    <a href="{{ route('passenger.profile.edit') }}" class="btn-custom btn-edit">
        Edit Profile
    </a>
</div>
   
    
        </div>
    </div>

</body>
</html>