<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Transmission;
use App\Http\Controllers\Controller;

class TransmissionController extends Controller
{
    // Display a listing of the transmissions
    public function index()
    {
        $transmissions = Transmission::all();
        return view('admin.transmissions.index', compact('transmissions'));
    }

    // Show the form for creating a new transmission
    public function create()
    {
        return view('admin.transmissions.create');
    }

    // Store a newly created transmission in storage
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|unique:transmissions',
        ]);
    
        // Transmission record create
        Transmission::create($request->all());
    
        // AJAX response
        return response()->json(['status' => true, 'message' => 'Transmission created successfully.']);
    }
    

    // Show the form for editing the specified transmission
    public function edit(Transmission $transmission)
    {
        return view('admin.transmissions.edit', compact('transmission'));
    }

    // Update the specified transmission in storage
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|unique:transmissions,name,' . $id, // Unique with respect to the current id
        ]);
    
        // Find the transmission by ID
        $transmission = Transmission::findOrFail($id);
        
        // Update transmission details
        $transmission->name = $request->name;
        $transmission->save(); // Save the updated model
    
        // Return a JSON response for Ajax request
        return response()->json(['status' => true, 'message' => 'Transmission updated successfully.']);
    }
    

    // Remove the specified transmission from storage
    public function destroy(Transmission $transmission)
    {
        $transmission->delete();
        return redirect()->back()->with('success', 'Transmission deleted successfully.');
    }
}
