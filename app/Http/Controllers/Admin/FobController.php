<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $query = Fob::latest('id');

        if ($req->has('keyword')) {
            $query->where('min_price', 'like', '%' . $req->input('keyword') . '%')
            ->orWhere('max_price', 'like', '%' . $req->input('keyword') . '%');
        }

        $fobs = $query->paginate(10);
        return view('admin.fob.index', compact('fobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fob.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min' => 'required',
            'max' => 'required|gt:min'
        ]);

        if ($validator->passes()) {
            $Fob = new Fob();
            $Fob->min_price =  $request->min;
            $Fob->max_price =  $request->max;

            $Fob->save();
            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fob = Fob::findOrFail($id); // Find Make by ID
        return view('admin.fob.edit', compact('fob')); // Return edit Make form view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fob = Fob::find($id);

        $validator = Validator::make($request->all(), [
            'min' => 'required',
            'max' => 'required|gt:min'
        ]);
        if ($validator->passes()) {

            $fob->min_price =  $request->min;
            $fob->max_price =  $request->max;
            $fob->save();

            Session()->flash('success', 'Fob Edit successfully');
            return response()->json([
                'status' => true,
                'message' => 'Fob Edit successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fob = Fob::find($id);
        if (empty($fob)) {
            Session()->flash('error', 'Fob Deleted Failed');
            return redirect()->route('admin.Fob.index');
        };
        $fob->delete();

        Session()->flash('success', 'Fob Deleted successfully');
        return response()->json([
            'status' => true,
            'errors' => "Fob Deleted successfully"
        ]);
    }
}
