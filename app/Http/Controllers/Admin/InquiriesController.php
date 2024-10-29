<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiriesController extends Controller
{
    // Show the list of inquiries
    public function index()
    {
        // Retrieve all inquiries
        $inquiries = Inquiry::with('car')->with('replies.user')->get();

        // Return the view with the inquiries data
        return view('admin.inquiries.index', compact('inquiries'));
    }
     public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}
