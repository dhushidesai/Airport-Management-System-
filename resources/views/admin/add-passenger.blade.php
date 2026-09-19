<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Passenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Dark Theme - UI Design */
        body { background: #16181d; color: white; font-family: sans-serif; display: flex; margin: 0; }
        .sidebar { width: 250px; height: 100vh; background: #1f2530; padding: 25px; position: fixed; }
        .logo { color: white; font-weight: bold; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }
        .logo i { color: #007bff; } /* Blue Logo Icon */
        .sidebar a { display: block; color: #a1a1a1; text-decoration: none; padding: 12px 0; transition: 0.3s; }
        .sidebar a:hover { color: white; }
        
        .main { margin-left: 250px; width: calc(100% - 250px); min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 20px; }
        
        /* Modern Card Form */
        .form-card { background: #1f2530; padding: 40px; border-radius: 20px; width: 100%; max-width: 500px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .form-card h3 { color: #00c2ff; margin-bottom: 25px; text-align: center; }
        
        input, select { background: #16181d !important; border: 1px solid #333 !important; color: white !important; padding: 15px !important; margin-bottom: 20px !important; border-radius: 12px !important; width: 100%; }
        input:focus { border-color: #007bff !important; outline: none; }
        
        button { background: #007bff; color: white; border: none; padding: 15px; border-radius: 12px; width: 100%; font-weight: bold; font-size: 16px; transition: 0.3s; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo"><i class="fa-solid fa-plane"></i> airport system</div>
    <a href="/admin/passengers"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
</div>

<div class="main">
    <div class="form-card">
        <h3>Add New Passenger</h3>

        <form action="/admin/add-passenger" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="passport_no" placeholder="Passport Number" required>
            <input type="text" name="flight_no" placeholder="Flight Number" required>
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="text" name="email" placeholder="Email Address" required>
            <select name="status">
                <option value="Checked In">Checked In</option>
                <option value="Boarding">Boarding</option>
                <option value="Delayed">Delayed</option>
            </select>
            
            <button type="submit">Add Passenger</button>
        </form>
    </div>
</div>

</body>
</html>