<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Flights Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

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

display:flex;

color:white;
}

/* SIDEBAR */

.sidebar{

width:250px;

height:100vh;

background:#1f2530;

padding:25px 18px;

position:fixed;
}

.logo{

display:flex;

align-items:center;

gap:10px;

margin-bottom:35px;
}

.logo i{

color:#00c2ff;

font-size:22px;
}

.logo h2{

font-size:22px;

margin:0;
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

background:#2b313d;

color:white;
}

/* MAIN */

.main{

margin-left:250px;

width:100%;

padding:30px;
}

/* TOPBAR */

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

.add-btn{

background:#00c2ff;

padding:12px 22px;

border-radius:12px;

text-decoration:none;

color:white;

font-weight:600;
}

/* CARDS */

.card-box{

background:#1f2530;

padding:25px;

border-radius:20px;

transition:0.3s;
}

.card-box:hover{

transform:translateY(-5px);
}

.card-box i{

font-size:30px;

color:#00c2ff;

margin-bottom:15px;
}

.card-box h2{

font-size:34px;

margin-bottom:8px;
}

/* TABLE */

.table-box{

background:#1f2530;

padding:25px;

border-radius:20px;

margin-top:30px;
}

table{

width:100%;
}

table tr{

border-bottom:1px solid rgba(255,255,255,0.08);
}

table th{

padding:18px;

color:#00c2ff;
}

table td{

padding:18px;

color:#d7d7d7;
}

.action i{

margin-right:15px;

cursor:pointer;
}

.edit{

color:#57d17b;
}

.delete{

color:#ff6b6b;
}

.status{
padding:6px 12px;
border-radius:20px;
font-size:12px;
font-weight:600;
display:inline-block;
}

.on-time{
background:#14532d;
color:#4ade80;
}

.delayed{
background:#4c0519;
color:#fb7185;
}

.boarding{
background:#78350f;
color:#facc15;
}
.search-input { 
    background: #1f2530; 
    border: 1px solid #333; 
    color: white; 
    padding: 10px; 
    border-radius: 10px; 
    width: 300px; 
    margin-bottom: 20px; 
    display: block; 
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

<a href="/admin/dashboard">
<i class="fa-solid fa-chart-line"></i>
Dashboard
</a>

<a href="/admin/flights">
<i class="fa-solid fa-plane"></i>
Flights
</a>

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

<a href="/logout">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<h1>Flights Dashboard</h1>

<a href="/admin/add-flight"
class="add-btn">

<i class="fa-solid fa-plus"></i>

Add Flight

</a>

</div>

<!-- CARDS -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card-box" style="background:#1f2530; padding:10px; border-radius:10px; border-left:5px solid #007bff;">
            <i class="fa-solid fa-plane" style="color:#007bff;"></i>
            <h3>{{ $total }}</h3>
            <p>Total Flights</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box" style="background:#1f2530; padding:10px; border-radius:10px; border-left:5px solid #dc3545;">
            <i class="fa-solid fa-clock" style="color:#dc3545;"></i>
            <h3>{{ $delayed }}</h3>
            <p>Delayed</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box" style="background:#1f2530; padding:10px; border-radius:10px; border-left:5px solid #ffc107;">
            <i class="fa-solid fa-plane-departure" style="color:#ffc107;"></i>
            <h3>{{ $boarding }}</h3>
            <p>Boarding</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-box" style="background:#1f2530; padding:10px; border-radius:10px; border-left:5px solid #28a745;">
            <i class="fa-solid fa-check" style="color:#28a745;"></i>
            <h3>{{ $onTime }}</h3>
            <p>On Time</p>
        </div>
    </div>
</div>



<div class="table-box">

<input type="text" id="searchInput" onkeyup="searchFlights()" class="search-input" placeholder="Search Flight No...">

<table>
    <thead>

<tr>

<th>ID</th>

<th>Flight No</th>

<th>Airline</th>

<th>Departure</th>

<th>Destination</th>

<th>Date</th>

<th>Time</th>

<th>Gate</th>

<th>Status</th>

<th>Action</th>

</tr>
</thead>
<tbody id="flightTable">

@foreach($flights as $flight)

<tr>

<td>{{ $flight->id }}</td>

<td>{{ $flight->flight_no }}</td>

<td>{{ $flight->airline }}</td>

<td>{{ $flight->departure }}</td>

<td>{{ $flight->destination }}</td>

<td>{{ $flight->date }}</td>

<td>{{ $flight->departure_time }}</td>

<td>{{ $flight->gate }}</td>

<td>

@if($flight->status == 'On Time')

<span class="status on-time">

{{ $flight->status }}

</span>

@elseif($flight->status == 'Delayed')

<span class="status delayed">

{{ $flight->status }}

</span>

@else

<span class="status boarding">

{{ $flight->status }}

</span>

@endif

</td>

<td class="action">

<a href="/edit-flight/{{ $flight->id }}">

<i class="fa-solid fa-pen edit"></i>

</a>

<a href="/delete-flight/{{ $flight->id }}">

<i class="fa-solid fa-trash delete" onclick="return confirm('Are you sure?')"></i>

</a>

</td>

</tr>

@endforeach

</table>

</div>

</div>
<script>
function searchFlights() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let rows = document.getElementById("flightTable").getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        let flightNo = rows[i].getElementsByTagName("td")[1];
        rows[i].style.display = (flightNo && flightNo.textContent.toUpperCase().indexOf(input) > -1) ? "" : "none";
    }
}
</script>

</body>

</html>