<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Make;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Type;
use Illuminate\Support\Facades\Validator;

class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodyTypes = Type::all(); // Fetch all make
        return view('admin.bodyType.index', compact('bodyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bodyType.create'); // Return create Make form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        // return $request; 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:types,slug',
        ]);
        if ($validator->passes()) {
            Type::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' =>  $request->status,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Body Type created successfully.'
            ]);
        }
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);

        // Create new Make

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bodyType = Type::findOrFail($id); // Find Make by ID
        return view('admin.bodyType.show', compact('bodyType')); // Return show Make view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bodyType = Type::findOrFail($id); // Find Make by ID
        return view('admin.bodyType.edit', compact('bodyType')); // Return edit Make form view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $Type = Type::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:types,slug,' . $id . ',id'
        ]);
        if ($validator->passes()) {
            $Type->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' =>  $request->status,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Body Type updated successfully.'
            ]);
        }
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      
        $bodyType = Type::findOrFail($id);
        $bodyType->delete();

        return redirect()->route('admin.bodyType.index')->with('success', 'bodyType deleted successfully.');
    }
}
