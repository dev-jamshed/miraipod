<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Response;

class ContactUsController extends Controller
{
    public function index()
    {
        $data = ContactUs::get();
        return view('admin.contact-us.index',compact('data'));
    }

    // function store(request $request){

    //     try{
    //         $table = new ContactUs();
    //         $table->name = $request->name;
    //         $table->email = $request->email;
    //         $table->phone = $request->phone;
    //         $table->subject = $request->subject;
    //         $table->message = $request->message;

    //         if($table->save()){
    //             return Response::json(['message' => 'Your Query Submitted Successfully'], 200);
    //         }

    //     }
    //     catch(\Exception $e){
    //         return Response::json(['message' => 'Failed to send Query please try again', 'error' => $e->getMessage()], 500);
    //     }
        
    // }

    public function destroy(request $request)
    {
        try{
            $table = ContactUs::findOrFail($request->id);

            if($table->delete()){
                return Response::json(['message' => 'Query deleted successfully'], 200);
            }
        }
        catch(\Exception $e){
            return Response::json(['message' => 'Failed to delete Query', 'error' => $e->getMessage()], 500);
        }

    }
}
