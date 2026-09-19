<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, Helvetica, sans-serif;
}

body{
background:#16181d;
color:white;
display:flex;
}

/* SIDEBAR */

.sidebar{

width:250px;
height:100vh;

background:#111c2e;

padding:25px 18px;

position:fixed;

overflow-y:auto;
}

.logo{

display:flex;
align-items:center;
gap:10px;
margin-bottom:35px;
}



.logo i{

color:#4da3ff;
font-size:22px;
}

.logo h2{

font-size:24px;
}

.sidebar a{

display:flex;
align-items:center;
gap:12px;

padding:14px;

margin-bottom:12px;

text-decoration:none;

color:#d8d8d8;

border-radius:12px;

transition:0.3s;
}

.sidebar a:hover{

background:#1d2d44;
color:white;
}

/* MAIN */

.main{

margin-left:250px;

width:100%;

padding:30px;
}

/* TOP */

.topbar{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:30px;
}

.topbar h1{

font-size:32px;
font-weight:700;
}

.admin-btn{

background:#4da3ff;

padding:10px 20px;

border-radius:12px;
}

/* CARDS */

.stat-card{

background:#162235;

padding:25px;

border-radius:20px;

transition:0.3s;
}

.stat-card:hover{

transform:translateY(-5px);
}

.stat-top{

display:flex;
justify-content:space-between;
align-items:center;

margin-bottom:20px;
}

.stat-top i{

font-size:28px;
color:#4da3ff;
}

.stat-card h2{

font-size:34px;
font-weight:700;
}

.stat-card p{

color:#c8c8c8;
}

/* TABLE BOX */

.table-box{

background:#162235;

padding:25px;

border-radius:20px;

margin-top:30px;
}

.table-box h3{

margin-bottom:20px;
}

table{

width:100%;
}

table tr{

border-bottom:1px solid rgba(255,255,255,0.08);
}

table th{

padding:15px;

color:#4da3ff;
}

table td{

padding:15px;

color:#d7d7d7;
}

.status{

padding:6px 14px;

border-radius:30px;

font-size:13px;
}

.on{

background:rgba(87,209,123,0.15);
color:#57d17b;
}

.delay{

background:rgba(255,107,107,0.15);
color:#ff6b6b;
}

/* REPORT BOX */

.report-box{

background:#162235;

padding:25px;

border-radius:20px;

margin-top:30px;
}

.report-card{

background:#1f314b;

padding:25px;

border-radius:18px;

text-align:center;

transition:0.3s;
}

.report-card:hover{

transform:scale(1.04);
}

.report-card i{

font-size:35px;

margin-bottom:15px;

color:#4da3ff;
}

/* PROFILE */

.profile-box{

background:#162235;

padding:25px;

border-radius:20px;

margin-top:30px;
}

.profile-top{

display:flex;
align-items:center;
justify-content:space-between;

margin-bottom:20px;
}

.profile-icon{

width:70px;
height:70px;

border-radius:50%;

background:#1f314b;

display:flex;
justify-content:center;
align-items:center;

font-size:28px;
color:#4da3ff;
}

.edit-btn{

background:#4da3ff;

padding:10px 18px;

border-radius:10px;

border:none;

color:white;
}

.profile-info p{

margin-bottom:12px;

color:#d6d6d6;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">

<i class="fa-solid fa-plane"></i>

<h2>airport system</h2>

</div>

<a href="#"><i class="fa-solid fa-chart-line"></i> Dashboard</a>

<a href="/admin/flights">
    <i class="fa-solid fa-plane"></i>
    flights</a>

<a href="/admin/passengers">
<i class="fa-solid fa-users"></i>
Passengers
</a>


<a href="/admin/schedules">
<i class="fa-solid fa-calendar"></i>
Schedules
</a>

<a href="/admin/reports">
<i class="fa-solid fa-file-lines"></i>
Reports
</a>

<a href="{{ route('admin.supports') }}" class="nav-link">
    <i class="fa fa-envelope"></i> Support Requests
</a>

<a href="/logout">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<div class="topbar">

<h1>Admin Dashboard</h1>

<div class="admin-btn">
Admin
</div>

</div>

<!-- CARDS -->

<div class="row g-4">

<div class="col-md-3">

<div class="stat-card">

<div class="stat-top">

<h5>Total Flights</h5>

<i class="fa-solid fa-plane"></i>

</div>

<h2>120</h2>

<p>Flights Operating</p>

</div>

</div>

<div class="col-md-3">

<div class="stat-card">

<div class="stat-top">

<h5>Total Passengers</h5>

<i class="fa-solid fa-users"></i>

</div>

<h2>1350</h2>

<p>Checked In</p>

</div>

</div>


<div class="col-md-3">

<div class="stat-card">

<div class="stat-top">

<h5>Today's Flights</h5>

<i class="fa-solid fa-plane-departure"></i>

</div>

<h2>18</h2>

<p>Scheduled Today</p>

</div>

</div>

</div>

<!-- ARRIVAL + DEPARTURE -->

<div class="row">

<div class="col-md-6">

<div class="table-box">

<h3>Upcoming Arrivals</h3>

<table>

<tr>
<th>Flight</th>
<th>From</th>
<th>Gate</th>
<th>Status</th>
</tr>

<tr>
<td>EK203</td>
<td>Dubai</td>
<td>A2</td>
<td><span class="status on">On Time</span></td>
</tr>

<tr>
<td>AI104</td>
<td>Delhi</td>
<td>B1</td>
<td><span class="status delay">Delayed</span></td>
</tr>

</table>

</div>

</div>

<div class="col-md-6">

<div class="table-box">

<h3>Upcoming Departures</h3>

<table>

<tr>
<th>Flight</th>
<th>To</th>
<th>Time</th>
<th>Status</th>
</tr>

<tr>
<td>SL302</td>
<td>London</td>
<td>10:30 AM</td>
<td><span class="status on">On Time</span></td>
</tr>

<tr>
<td>QR112</td>
<td>Singapore</td>
<td>01:15 PM</td>
<td><span class="status on">Boarding</span></td>
</tr>

</table>

</div>

</div>

</div>


</body>

</html>