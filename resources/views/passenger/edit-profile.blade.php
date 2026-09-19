<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body { background: #090d16; color: #fff; font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .edit-card { width: 100%; max-width: 400px; background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(15px); padding: 30px; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        h3 { text-align: center; margin-bottom: 25px; color: #38bdf8; }
        .input-box { width: 100%; padding: 12px; margin: 10px 0; background: #0f172a; border: 1px solid #334155; border-radius: 10px; color: white; box-sizing: border-box; }
        .btn-container { display: flex; gap: 10px; margin-top: 20px; }
        .btn-save { flex: 1; padding: 12px; border: none; border-radius: 10px; background: #22c55e; color: white; cursor: pointer; font-weight: bold; }
        .btn-cancel { flex: 1; padding: 12px; border: none; border-radius: 10px; background: #64748b; color: white; text-decoration: none; text-align: center; font-weight: bold; }
        label { font-size: 13px; color: #94a3b8; }
    </style>
</head>
<body>

<div class="edit-card">
    <h3>Edit Profile</h3>
    <form action="{{ route('passenger.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label>Profile Picture</label>
        <input type="file" name="avatar" class="input-box">

        <label>Full Name</label>
        <input type="text" name="name" class="input-box" value="{{ $passenger->name ?? '' }}" required>

        <label>Email Address</label>
        <input type="email" name="email" class="input-box" value="{{ $passenger->email ?? '' }}" required>

        <label>Passport Number</label>
        <input type="text" name="passport_no" class="input-box" value="{{ $passenger->passport_no ?? '' }}" required>

        <div class="btn-container">
            <button type="submit" class="btn-save">Save Changes</button>
            <a href="{{ route('passenger.profile') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>