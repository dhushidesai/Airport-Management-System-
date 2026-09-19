<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body { background: #0a0e17; color: white; font-family: sans-serif; margin: 0; display: flex; min-height: 100vh; }
        
        .sidebar { width: 260px; padding: 30px 20px; border-right: 1px solid #1f2530; }
        .logo { font-weight: bold; font-size: 1.2rem; margin-bottom: 40px; display: block; }
        .logo i { color: #007bff; margin-right: 10px; }
        .back-link { color: #a1a1a1; text-decoration: none; }
        
        .content { flex-grow: 1; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .form-box { background: #111827; padding: 35px; border-radius: 20px; width: 100%; max-width: 400px; border: 1px solid #1f2530; }
        
       
        .form-control { 
            background: #1f2530 !important; 
            border: 1px solid #334155 !important; 
            color: white !important; 
            margin-bottom: 15px; 
            padding: 12px; 
            border-radius: 10px; 
        }
        .form-control::placeholder { color: #888; font-size: 0.9rem; } 
        
        .btn-add { width: 100%; background: #007bff; border: none; padding: 12px; color: white; border-radius: 10px; font-weight: bold; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo"><i class="fa-solid fa-plane"></i> <span style="color: white;">airport system</span></div>
    <a href="/admin/schedules" class="back-link"><i class="fa-solid fa-arrow-left"></i> Back to Schedules</a>
</div>

<div class="content">
    <div class="form-box">
        <h4 class="text-center mb-4" style="color: white;">Add New Schedule</h4>
        <form action="/admin/store-schedule" method="POST">
            @csrf
            <!-- placeholders சேர்க்கப்பட்டுள்ளது -->
            <input type="text" name="flight_no" class="form-control" placeholder="Flight Number" required>
            <input type="text" name="from_location" class="form-control" placeholder="From" required>
            <input type="text" name="to_location" class="form-control" placeholder="To" required>
            <input type="text" name="departure_time" class="form-control timepicker" placeholder="Departure Time" required>
            <input type="text" name="arrival_time" class="form-control timepicker" placeholder="Arrival Time" required>
            <input type="text" name="gate" class="form-control" placeholder="Gate" required>
            
            <select name="status" class="form-control" style="color: #888 !important;">
                <option value="On Time">On Time</option>
                <option value="Boarding">Boarding</option>
                <option value="Delayed">Delayed</option>
            </select>
            
            <button type="submit" class="btn-add">Add Schedule</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr(".timepicker", { 
        enableTime: true, 
        noCalendar: true, 
        dateFormat: "h:i K",
        minuteIncrement: 1 
    });
</script>
</body>
</html>