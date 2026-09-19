<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Passenger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #16181d; color: white; font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .edit-form-card { 
            background: #1f2530; 
            padding: 40px; 
            border-radius: 20px; 
            width: 100%; 
            max-width: 500px; 
            border: 1px solid #333;
        }
        h2 { color: white; margin-bottom: 30px; text-align: center; }
        .form-label { color: #a1a1a1; font-size: 14px; margin-bottom: 5px; }
        .form-control { 
            background: #16181d !important; 
            border: 1px solid #333 !important; 
            color: white !important; 
            border-radius: 10px; 
            padding: 12px;
            margin-bottom: 20px;
        }
        .btn-update { background: #007bff; color: white; border: none; width: 100%; padding: 12px; border-radius: 10px; font-weight: bold; margin-bottom: 10px; }
        .btn-cancel { background: #444; color: white; border: none; width: 100%; padding: 12px; border-radius: 10px; font-weight: bold; text-decoration: none; text-align: center; }
        .btn-update:hover { background: #0056b3; color: white; }
        .btn-cancel:hover { background: #555; color: white; }
    </style>
</head>
<body>

<div class="edit-form-card">
    <h2>Edit Passenger</h2>
    <form action="/admin/update-passenger/{{ $passenger->id }}" method="POST">
        @csrf
        
        <label class="form-label">Passenger Name</label>
        <input type="text" name="name" class="form-control" value="{{ $passenger->name }}" required>

        <label class="form-label">Passport No</label>
        <input type="text" name="passport_no" class="form-control" value="{{ $passenger->passport_no }}" required>

        <label class="form-label">Flight No</label>
        <input type="text" name="flight_no" class="form-control" value="{{ $passenger->flight_no }}" required>

        <label class="form-label">Destination</label>
        <input type="text" name="destination" class="form-control" value="{{ $passenger->destination }}" required>

        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" value="{{ $passenger->email }}" required>

        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="Checked In" {{ $passenger->status == 'Checked In' ? 'selected' : '' }}>Checked In</option>
            <option value="Boarding" {{ $passenger->status == 'Boarding' ? 'selected' : '' }}>Boarding</option>
            <option value="Delayed" {{ $passenger->status == 'Delayed' ? 'selected' : '' }}>Delayed</option>
        </select>
     


        <button type="submit" class="btn btn-update">Update Passenger</button>
        <a href="/admin/passengers" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>