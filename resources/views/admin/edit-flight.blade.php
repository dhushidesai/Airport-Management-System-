<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Flight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #16181d; color: white; font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        
       
        .edit-form-card { 
            background: #1f2530; 
            padding: 30px; 
            border-radius: 20px; 
            width: 80%; 
            max-width: 400px; 
            border: 1px solid #333;
        }
        
        h2 { color: white; margin-bottom: 25px; text-align: center; font-size: 22px; }
        
        .form-label { color: #a1a1a1; font-size: 13px; margin-bottom: 5px; }
        
        .form-control, .form-select { 
            background: #16181d !important; 
            border: 1px solid #333 !important; 
            color: white !important; 
            border-radius: 8px; 
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .btn-update { 
            background: #007bff; 
            color: white; 
            border: none; 
            width: 100%; 
            padding: 10px; 
            border-radius: 8px; 
            font-weight: bold; 
            margin-bottom: 10px; 
        }
        
        .btn-cancel { 
            background: #444; 
            color: white; 
            border: none; 
            width: 100%; 
            padding: 10px; 
            border-radius: 8px; 
            font-weight: bold; 
            text-decoration: none; 
            text-align: center; 
            display: block;
        }
        
        .btn-update:hover { background: #0056b3; color: white; }
        .btn-cancel:hover { background: #555; color: white; }
    </style>
</head>
<body>

<div class="edit-form-card">
    <h2>Edit Flight</h2>
    <form action="/admin/update-flight/{{ $flight->id }}" method="POST">
        @csrf
        
        <label class="form-label">Flight No</label>
        <input type="text" name="flight_no" class="form-control" value="{{ $flight->flight_no }}" required>

        <label class="form-label">Airline</label>
        <input type="text" name="airline" class="form-control" value="{{ $flight->airline }}" required>

        <label class="form-label">Departure</label>
        <input type="text" name="departure" class="form-control" value="{{ $flight->departure }}" required>

        <label class="form-label">Destination</label>
        <input type="text" name="destination" class="form-control" value="{{ $flight->destination }}" required>

         <label for="date">Date</label>
       <input type="date" name="date" class="form-control" value="{{ $flight->date }}">

        <label class="form-label">Departure Time</label>
        <input type="time" name="departure_time" class="form-control" value="{{ $flight->departure_time }}" required>

        <label class="form-label">Landing Time</label>
        <input type="time" name="landing_time" class="form-control" value="{{ $flight->landing_time }}">
        
        <label class="form-label">Gate</label>
        <input type="text" name="gate" class="form-control" value="{{ $flight->gate }}" required>

        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="On Time" {{ $flight->status == 'On Time' ? 'selected' : '' }}>On Time</option>
            <option value="Delayed" {{ $flight->status == 'Delayed' ? 'selected' : '' }}>Delayed</option>
            <option value="Boarding" {{ $flight->status == 'Boarding' ? 'selected' : '' }}>Boarding</option>
        </select>

        <button type="submit" class="btn btn-update">Update Flight</button>
        <a href="/admin/flights" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>