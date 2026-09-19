<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        *{ margin:0; 
        padding:0; 
        box-sizing:border-box; 
        font-family:Arial, Helvetica, sans-serif;
     }
        body{ 
            background:#16181d; 
            display:flex;
             color:white;
             }
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
             gap:10px; margin-bottom:35px;
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
            gap:12px; padding:14px; 
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
        .main{ 
            margin-left:250px; 
            width:100%; 
            padding:30px; 
        }
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
        .search-box{
             margin:30px 0;
             }
        .search-box input{
             background:#1f2530; 
             border:none; 
             padding:15px;
              border-radius:12px; 
              color:white; 
              width:300px;
             }
        .table-box{
             background:#1f2530; 
             padding:25px;
              border-radius:20px; 
              margin-top:20px;
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
        .status{ 
            padding:8px 14px; 
            border-radius:20px; 
            font-size:14px; 
            font-weight:600;
         }
        .checked{ 
            background:#1f5133; 
            color:#57d17b; 
        }
        .boarding{ 
            background:#4b3c12; 
            color:#ffcc00; 
        }
        .cancelled{ 
            background:#4f1f1f; 
            color:#ff6b6b;
         }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo"><i class="fa-solid fa-plane"></i><h2>airport system</h2></div>
    <a href="/admin/dashboard"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="/admin/flights"><i class="fa-solid fa-plane"></i> Flights</a>
    <a href="/admin/passengers"><i class="fa-solid fa-users"></i> Passengers</a>
    <a href="/admin/schedules"><i class="fa-solid fa-calendar"></i> Schedules</a>
    <a href="/admin/reports"><i class="fa-solid fa-file-lines"></i> Reports</a>
    <a href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<div class="main">
    <div class="topbar">
        <h1>Passenger Dashboard</h1>
        <a href="/admin/add-passenger" class="add-btn"><i class="fa-solid fa-plus"></i> Add Passenger</a>
    </div>

    <div class="row g-4">
    <div class="col-md-4">
        <div class="card-box" style="background: #1f2530; padding: 20px; border-radius: 15px; text-align: center; border-left: 5px solid #007bff;">
            <i class="fa-solid fa-users" style="color:#007bff; font-size: 24px;"></i>
            <h2 class="mt-2">{{ count($passengers) }}</h2>
            <p style="color:#a1a1a1;">Total Passengers</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box" style="background: #1f2530; padding: 20px; border-radius: 15px; text-align: center; border-left: 5px solid #28a745;">
            <i class="fa-solid fa-check" style="color:#28a745; font-size: 24px;"></i>
            <h2 class="mt-2">{{ $passengers->where('status', 'Checked In')->count() }}</h2>
            <p style="color:#a1a1a1;">Checked In</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-box" style="background: #1f2530; padding: 20px; border-radius: 15px; text-align: center; border-left: 5px solid #ffc107;">
            <i class="fa-solid fa-plane-departure" style="color:#ffc107; font-size: 24px;"></i>
            <h2 class="mt-2">{{ $passengers->where('status', 'Boarding')->count() }}</h2>
            <p style="color:#a1a1a1;">Boarding</p>
        </div>
    </div>
</div>

    <div class="search-box">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search Passenger Name...">
    </div>

    <div class="table-box">
        <table id="passengerTable">
            <tr>
                <th>ID</th><th>Name</th><th>Passport No</th><th>Flight No</th><th>Destination</th><th>Email</th><th>Status</th><th>Action</th>
            </tr>
            @foreach($passengers as $passenger)
            <tr>
                <td>{{ $passenger->id }}</td>
                <td>{{ $passenger->name }}</td>
                <td>{{ $passenger->passport_no }}</td>
                <td>{{ $passenger->flight_no }}</td>
                <td>{{ $passenger->destination }}</td>
                <td>{{ $passenger->email }}</td>
                
                <td>
                    @if($passenger->status == 'Checked In') <span class="status checked">{{ $passenger->status }}</span>
                    @elseif($passenger->status == 'Boarding') <span class="status boarding">{{ $passenger->status }}</span>
                    @else <span class="status cancelled">{{ $passenger->status }}</span> @endif
                </td>
                <td>
                    <a href="/edit-passenger/{{ $passenger->id }}" style="color: green; margin-right: 10px;"><i class="fa fa-pencil-alt"></i></a>
                    <a href="/delete-passenger/{{ $passenger->id }}" style="color: red;"><i class="fa fa-trash" onclick="return confirm('Are you sure?')"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("passengerTable"); 
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; 
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

</body>
</html>