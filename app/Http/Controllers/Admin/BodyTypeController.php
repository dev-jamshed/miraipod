<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Make;
use App\Models\Admin\tmp_image;
use App\Models\Admin\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Item_image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
          $bodyType =   Type::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' =>  $request->status,
            ]);


            if (!empty($request->images_array)) {
                foreach ($request->images_array as $temp_img_id) {
                    $temp_img = tmp_image::find($temp_img_id);
                    $ext = last(explode('.', $temp_img->name));
                    $bodyType_image = new Item_image();
                    $image_name =  'bodyType' . '-' . $bodyType->id . '-' . Str::random(6) . time() . '.' . $ext; // Access id property of $make
                    $bodyType_image->type_id =  $bodyType->id;
                    $bodyType_image->image = $image_name;
                    $bodyType_image->save();

                    // Copy image to new location
                    $tempImagePath = public_path('temp/' . $temp_img->name);
                    $newImagePath = public_path('images/bodyType/' . $image_name);
                    File::copy($tempImagePath, $newImagePath);
                    // Delete temporary image record from database
                    $temp_img->delete() ;



                    // Delete temporary image file from storage
                    if (File::exists($tempImagePath)) {
                        File::delete($tempImagePath);
                    }
                }
            }


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
        $bodyType = Type::with('typeImages')->findOrFail($id); // Find Make by ID
        // return $bodyType;
        return view('admin.bodyType.edit', compact('bodyType')); // Return edit Make form view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $bodyType = Type::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:types,slug,' . $id . ',id'
        ]);
        if ($validator->passes()) {
        

            $bodyType->name =$request->name;
            $bodyType->slug =$request->slug;
            $bodyType->status =$request->status;

            if (!empty($request->images_array)) {
                foreach ($request->images_array as $temp_img_id) {
                    $temp_img = tmp_image::find($temp_img_id);
                    $ext = last(explode('.', $temp_img->name));
                    $bodyType_image = new Item_image();
                    $image_name =  'bodyType' . '-' . $bodyType->id . '-' . Str::random(6) . time() . '.' . $ext; // Access id property of $make
                    $bodyType_image->type_id =  $bodyType->id;
                    $bodyType_image->image = $image_name;
                    $bodyType_image->save();
    
                    // Copy image to new location
                    $tempImagePath = public_path('temp/' . $temp_img->name);
                    $newImagePath = public_path('images/bodyType/' . $image_name);
                    File::copy($tempImagePath, $newImagePath);
                    // Delete temporary image record from database
                    $temp_img->delete();
    
    
    
                    // Delete temporary image file from storage
                    if (File::exists($tempImagePath)) {
                        File::delete($tempImagePath);
                    }
                }
            }


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
