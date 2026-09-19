<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #16181d; color: white; padding: 50px; font-family: sans-serif; }
        .edit-card { background: #1f2530; padding: 40px; border-radius: 20px; border: 1px solid #333; max-width: 600px; margin: auto; }
        .form-control, .form-select { background: #16181d !important; border: 1px solid #444 !important; color: white !important; }
        .btn-update { background: #007bff; border: none; width: 100%; padding: 12px; font-weight: bold; color: white; }
        .btn-update:hover { background: #0056b3; }
        h2 { margin-bottom: 30px; color: #00c2ff; }
    </style>
</head>
<body>

<div class="edit-card">
    <h2>Edit Schedule</h2>
    <form action="/admin/update-schedule/{{ $schedule->id }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Flight No</label>
            <input type="text" name="flight_no" class="form-control" value="{{ $schedule->flight_no }}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">From</label>
                <input type="text" name="from_location" class="form-control" value="{{ $schedule->from_location }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">To</label>
                <input type="text" name="to_location" class="form-control" value="{{ $schedule->to_location }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Departure</label>
                <input type="time" name="departure_time" class="form-control" value="{{ $schedule->departure_time }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Arrival</label>
                <input type="time" name="arrival_time" class="form-control" value="{{ $schedule->arrival_time }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="On Time" {{ $schedule->status == 'On Time' ? 'selected' : '' }}>On Time</option>
                <option value="Delayed" {{ $schedule->status == 'Delayed' ? 'selected' : '' }}>Delayed</option>
                <option value="Boarding" {{ $schedule->status == 'Boarding' ? 'selected' : '' }}>Boarding</option>
            </select>
        </div>
        <button type="submit" class="btn btn-update mt-3">Update Schedule</button>
        <a href="/admin/schedules" class="btn btn-secondary w-100 mt-2">Cancel</a>
    </form>
</div>

</body>
</html>