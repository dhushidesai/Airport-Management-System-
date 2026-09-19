<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { background: #16181d; color: white; font-family: sans-serif; display: flex; }
        .sidebar { width: 250px; height: 100vh; background: #1f2530; padding: 25px; position: fixed; }
        .logo { color: white; font-weight: bold; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }
        .logo i { color: #007bff; }
        .sidebar a { display: block; color: #a1a1a1; text-decoration: none; padding: 12px 0; }
        
        .main { margin-left: 250px; width: 100%; padding: 40px; display:flex; justify-content:center; align-item:center; height:90vh; }
        .form-container { background: #1f2530; padding: 30px; border-radius: 20px; width: 100%; max-width: 500px; }
        
        input, select { background: #16181d !important; border: 1px solid #333 !important; color: white !important; padding: 12px !important; margin-bottom: 15px !important; border-radius: 10px !important; width: 100%; }
        button { background: #007bff; color: white; border: none; padding: 12px 25px; border-radius: 10px; width: 100%; font-weight: bold; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo"><i class="fa-solid fa-plane"></i> airport system</div>
    <a href="/admin/staff"><i class="fa-solid fa-arrow-left"></i> Back to Staff</a>
</div>

<div class="main">
    <div class="form-container">
        <h3 class="mb-4">Add New Staff</h3>
        <form action="/admin/staff/store" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Staff Name" required>

            <select name="department" id="department" class="form-control">
    <option value="">-- Select Department --</option>
    @foreach($departments as $dept)
        <option value="{{ $dept }}">{{ $dept }}</option>
    @endforeach
</select>
           
        <select name="shift" class="form-control">
    @foreach($shifts as $shift)
        <option value="{{ $shift }}">{{ $shift }}</option>
    @endforeach
</select>
            
            <select name="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            <button type="submit">Save Staff</button>
        </form>
    </div>
</div>

</body>
</html>