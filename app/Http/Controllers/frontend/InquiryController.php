<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use App\Models\Inquiry;
use App\Models\InquiryReply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class InquiryController extends Controller
{
     public function index()
    {
        // Retrieve the logged-in user's inquiries
        $userId = Auth::id();
        $inquiries = Inquiry::with('car')->with('replies.user')->where('user_id', $userId)->get();
        // return $inquiries;
        // Return a view with the inquiries data
        return view('frontend.inquiries', compact('inquiries'));
    }
    public function store(Request $req) {
        
        // Validate the request data
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'country' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'car_id' => 'required|integer',
            'message' => 'required|string',
        ]);

        // Create a new Inquiry
        $inquiry = new Inquiry();
        $inquiry->name = $validatedData['name'];
        $inquiry->country_id = $validatedData['country'];
        $inquiry->email = $validatedData['email'];
        $inquiry->phone = $validatedData['phone'];
        $inquiry->car_id = $validatedData['car_id'];
        $inquiry->message = $validatedData['message'];
        $inquiry->user_id = auth()->id(); // Store the logged-in user's ID
        $inquiry->car_name = $req->car_name;
        $inquiry->is_whatsapp = $req->is_whatsapp ? 'Yes' : 'No';
        


        $inquiry->save();

        return response()->json([
            'status' => 200,
            'message' => 'Your inquiry has been submitted successfully.'
        ]);
    }
    public function storeContact(Request $req) {

        // Validate the request data
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            // 'country' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Create a new Inquiry
        $inquiry = new Contact();
        $inquiry->name = $validatedData['name'];
        $inquiry->subject = $validatedData['subject'];
        // $inquiry->country_id = $validatedData['country'];
        $inquiry->email = $validatedData['email'];
        $inquiry->phone = $validatedData['phone'];
        // $inquiry->car_id = $validatedData['car_id'];
        $inquiry->message = $validatedData['message'];
        // $inquiry->car_name = $req->car_name;
        $inquiry->save();

        return response()->json([
            'status' => 200,
            'message' => 'Your inquiry has been submitted successfully.'
        ]);
    }
    public function reply(Request $request, $id)
{
    $request->validate([
        'reply' => 'required|string',
    ]);

    // Inquiry ko find karein
    $inquiry = Inquiry::findOrFail($id);

    // Reply save karein
    InquiryReply::create([
        'inquiry_id' => $inquiry->id,
        'user_id' => auth()->id(), // Assuming user is authenticated
        'message' => $request->reply,
    ]);

    return response()->json(['message' => 'Reply sent successfully!']);
}

}

