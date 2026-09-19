<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    
  public function viewSupports()
{
    
    $supports = \App\Models\Support::latest()->get();
    return view('admin.supports', compact('supports'));
}

    public function adminReply(Request $request, $id) {
    $support = Support::findOrFail($id);
    $support->reply = $request->reply;
    $support->save();
    return back()->with('success', 'Reply sent successfully!');
}
}