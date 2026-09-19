<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

public function login(Request $request)
    {
     
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

       
        $admin = Admin::where('username', $request->username)->first();

        
        if ($admin && Hash::check($request->password, $admin->password)) {
            
            session(['admin_logged_in' => true, 'admin_username' => $admin->username]);
            
            return redirect('/admin/dashboard')->with('success', 'Welcome Admin!');
        } 

        
        return back()->withErrors(['message' => 'Invalid username or password']);
    }

    
 public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_username']);
        return redirect('/admin/login');
    }


}