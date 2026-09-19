<style>
    body {
     background: #0f172a; 
     font-family: 'Segoe UI', sans-serif; 
     display: flex; 
     justify-content: center;
      align-items: center; 
      min-height: 100vh; 
      margin: 0; 
      }
    .form-card { 
    background: #1e293b; 
    padding: 40px; 
    border-radius: 20px; 
    width: 100%; 
    max-width: 450px; 
    border: 1px solid #334155; 
    box-shadow: 0 20px 25px rgba(0,0,0,0.3); 
    }
    h3 { 
    color: #38bdf8; 
    text-align: center; 
    margin-bottom: 25px; 
    font-weight: 700;
     }
    input, select { 
    background: #0f172a !important; 
    border: 1px solid #475569 !important; 
    color: white !important; 
    padding: 12px !important; 
    margin-bottom: 15px !important; 
    border-radius: 10px !important; 
    width: 100%; 
    }
    .btn-update { 
    background: #10b981; 
    color: white; 
    border: none; 
    padding: 12px; 
    border-radius: 10px; 
    width: 100%; 
    font-weight: bold; 
    cursor: pointer; 
    transition: 0.3s; 
    }
    .btn-update:hover {
     background: #059669; 
     }
</style>

<div class="form-card">
    <h3>Edit Staff Details</h3>
    <form action="/admin/update-staff/{{ $staff->id }}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ $staff->name }}" required>
        
<select name="department" class="form-control custom-input">
    <option value="Ground Staff" {{ $staff->department == 'Ground Staff' ? 'selected' : '' }}>Ground Staff</option>
    <option value="Security" {{ $staff->department == 'Security' ? 'selected' : '' }}>Security</option>
    <option value="Admin" {{ $staff->department == 'Technical' ? 'selected' : '' }}>Technical</option>
    <option value="Maintenance" {{ $staff->department == 'Management' ? 'selected' : '' }}>Management</option>
</select>
        <select name="shift">
            <option value="Morning" {{ $staff->shift == 'Morning' ? 'selected' : '' }}>Morning</option>
            <option value="Evening" {{ $staff->shift == 'Evening' ? 'selected' : '' }}>Evening</option>
            <option value="Night" {{ $staff->shift == 'Night' ? 'selected' : '' }}>Night</option>
        </select>
        <select name="status">
            <option value="Active" {{ $staff->status == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $staff->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        <button type="submit" class="btn-update">Update Changes</button>
    </form>
</div>