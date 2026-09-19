<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        *{ margin:0; padding:0; box-sizing:border-box; font-family:Arial, Helvetica, sans-serif; }

        body{
            height:100vh;
            background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('/images/airport2.jpg');
            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
            overflow:hidden;
            color:white;
        }

        .navbar { padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; position: absolute; width: 100%; top: 0; }
        .logo-box { display: flex; align-items: center; gap: 10px; }
        .logo-box i { font-size: 18px; color: #4da3ff; }
        .logo-box h3 { font-size: 18px; font-weight: 500; margin: 0; letter-spacing: 1px; }
        .logo-box span { color: #4da3ff; }
        .nav-links { display: flex; gap: 20px; list-style: none; }
        .nav-links a { color: white; text-decoration: none; font-size: 16px; font-weight: 500; }
        .nav-links a:hover { color: #4da3ff; }

        .main-content{ width:100%; height:100vh; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; padding:20px; }
        
        .welcome-logo { font-size: 30px; color: #4da3ff; margin-bottom: 10px; }

        .welcome{ font-size:24px; font-weight:300; letter-spacing:4px; margin-bottom:10px; color:#dddddd; }
        .main-title{ font-size:58px; font-weight:700; line-height:75px; margin-bottom:20px; }
        .main-title span{ color:#4da3ff; }
        .caption{ width:650px; max-width:90%; font-size:17px; line-height:30px; color:#dddddd; margin-bottom:50px; }

        .login-container{ display:flex; gap:30px; flex-wrap:wrap; justify-content:center; }
        .login-card{ width:280px; padding:25px; border-radius:18px; background:rgba(255,255,255,0.08); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,0.15); transition:0.3s; }
        .login-card:hover{ transform:translateY(-8px); }
        .login-card i{ font-size:35px; margin-bottom:15px; }
        .admin i, .admin h3{ color:#4da3ff; }
        .passenger i, .passenger h3{ color:#57d17b; }
        .login-card h3{ font-size:22px; margin-bottom:12px; font-weight:600; }
        .login-card p{ font-size:14px; line-height:26px; color:#dddddd; margin-bottom:22px; }
        .login-btn{ width:100%; padding:11px; border:none; border-radius:30px; font-size:14px; font-weight:600; transition:0.3s; }
        .admin-btn{ background:#0d6efd; color:white; }
        .admin-btn:hover{ background:white; color:#0d6efd; }
        .passenger-btn{ background:#57d17b; color:white; }
        .passenger-btn:hover{ background:white; color:#57d17b; }
    </style>
</head>
<body>

    <!-- நேவிகேஷன் பார் -->
    <nav class="navbar">
        <div class="logo-box">
            <i class="fa-solid fa-plane"></i>
            <h3>airport <span>system</span></h3>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <div class="main-content">
        <h2 class="welcome">Welcome to</h2>
        <div class="welcome-logo"><i class="fa-solid fa-plane-departure"></i></div>
        
        <h1 class="main-title">Airport <span>Management</span> System</h1>
        <p class="caption">
            Smart and efficient platform to manage airport operations,
            flight schedules and passenger services seamlessly.
        </p>

        <div class="login-container">
            <div class="login-card admin">
                <i class="fa-solid fa-user-shield"></i>
                <h3>Admin Login</h3>
                <p>Secure login for administrators to manage the system.</p>
                <a href="/admin/login"><button class="login-btn admin-btn">Login as Admin</button></a>
            </div>
            <div class="login-card passenger">
                <i class="fa-solid fa-user"></i>
                <h3>Passenger Login</h3>
                <p>Access flight schedules and airport information.</p>
                <a href="/passenger/login"><button class="login-btn passenger-btn">Login as Passenger</button></a>
            </div>
        </div>
    </div>
</body>
</html>