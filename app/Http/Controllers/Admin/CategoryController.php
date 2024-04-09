<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create'); // Return create category form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
        ]);
        if ($validator->passes()) {
            Category::create([
                'name' => $request->name,
                'slug' => $request->slug
            ]);
            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        }
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);

        // Create new category

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id); // Find category by ID
        return view('admin.categories.show', compact('category')); // Return show category view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Find category by ID
        return view('admin.categories.edit', compact('category')); // Return edit category form view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id . ',id'
        ]);
        if ($validator->passes()) {
            $category->update([
                'name' => $request->name,
                'slug' => $request->slug
            ]);
            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
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
        // Find category by ID and delete
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
