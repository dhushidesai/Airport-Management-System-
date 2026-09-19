<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Flight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background: #0f172a; color: #f1f5f9; font-family: 'Segoe UI', sans-serif; display: flex; margin: 0; }
        .sidebar { width: 250px; height: 100vh; background: #1e293b; padding: 25px; position: fixed; border-right: 1px solid #334155; }
        .logo { color: white; font-weight: bold; margin-bottom: 40px; font-size: 1.2rem; display: flex; align-items: center; gap: 10px; }
        .logo i { color: #38bdf8; }
        .sidebar a { display: block; color: #94a3b8; text-decoration: none; padding: 15px 0; transition: 0.3s; }
        .sidebar a:hover { color: white; }
        
        .main { margin-left: 250px; width: calc(100% - 250px); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        
        .form-card { background: #1e293b; padding: 30px; border-radius: 20px; width: 100%; max-width: 400px; max-height:85vh; border: 1px solid #334155; box-shadow: 0 20px 25px rgba(0,0,0,0.3); }
        .form-card h3 { color: #38bdf8; margin-bottom: 30px; text-align: center; font-weight: bold; }
        
        input, select { background: #0f172a !important; border: 1px solid #475569 !important; color: white !important; padding: 12px !important; margin-bottom: 10px !important; border-radius: 10px !important; width: 100%; }
        input:focus { border-color: #38bdf8 !important; outline: none; }
        
        button { background: linear-gradient(to right, #3b82f6, #2563eb); color: white; border: none; padding: 15px; border-radius: 12px; width: 100%; font-weight: bold; transition: 0.3s; }
        button:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4); }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo"><i class="fa-solid fa-plane"></i> airport system</div>
    <a href="/admin/flights"><i class="fa-solid fa-arrow-left"></i> Back to Flights</a>
</div>

<div class="main">
    <div class="form-card">
        <h3>Add New Flight</h3>
        <form action="/admin/add-flight" method="POST">
            @csrf
            <input type="text" name="flight_no" placeholder="Flight Number" required>
            <input type="text" name="airline" placeholder="Airline Name" required>
            <input type="text" name="departure" placeholder="Departure" required>
            <input type="text" name="destination" placeholder="Destination" required>
             <input type="date" name="date" class="form-control" id="date" required>
            <input type="text" name="departure_time" placeholder="Departure Time" required>
            <input type="text" name="gate" placeholder="Gate" required>
        
           <select name="status" id="status" style="width: 100%; padding: 10px; border-radius: 5px;">
    <option value="On Time" style="color: green; font-weight: bold;">On Time</option>
    <option value="Boarding" style="color: #FFBF00; font-weight: bold;">Boarding</option>
    <option value="Delayed" style="color: red; font-weight: bold;">Delayed</option>
</select>
            <button type="submit">Add Flight</button>
        </form>
    </div>
</div>

</body>
</html>