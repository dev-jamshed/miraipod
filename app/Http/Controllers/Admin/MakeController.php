<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Make;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makes = Make::all(); // Fetch all make
        return view('admin.make.index', compact('makes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.make.create'); // Return create Make form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:makes,slug',
        ]);
        if ($validator->passes()) {
            Make::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' =>  $request->status,

            ]);
            return redirect()->route('admin.make.index')->with('success', 'Make created successfully.');
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
        $make = Make::findOrFail($id); // Find Make by ID
        return view('admin.make.show', compact('Make')); // Return show Make view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $make = Make::findOrFail($id); // Find Make by ID
        return view('admin.make.edit', compact('make')); // Return edit Make form view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $Make = Make::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:makes,slug,' . $id . ',id'
        ]);
        if ($validator->passes()) {
            $Make->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' =>  $request->status,
            ]);
            return redirect()->route('admin.make.index')->with('success', 'Make updated successfully.');
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
        // Find Make by ID and delete
        $Make = Make::findOrFail($id);
        $Make->delete();

        return redirect()->route('admin.make.index')->with('success', 'Make deleted successfully.');
    }
}
