<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Car;
use App\Models\Admin\Type;
use App\Models\Admin\tmp_image;
use App\Models\Admin\Item_image;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars =  Car::get();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bodyTypes =  Type::get();
        return view('admin.cars.create', compact('bodyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->body_type;
        $validator = Validator::make($request->all(), [
            'body_type' => 'required|integer|max:255',
            'chassis_no' => 'required|max:255',
            'model_grade' => 'required|max:255',
            'slug' => 'required|max:255',
            'show_cnf_price' => 'required|boolean',
            'status' => 'required|boolean',
            'cc' => 'required|integer'
        ]);
        if ($validator->passes()) {

           
            $lastCar = Car::orderBy('id', 'desc')->first(); // Get the last car record
            if ($lastCar) {
                // Extract the stock ID and increment it by 1
                $lastStockId = $lastCar->stock_id;
                $newStockId = $lastStockId + 1;
            } else {
                // If there are no previous records, start from 3714323372
                $newStockId = 3714323372;
            }
            $carData = [
                'stock_id' => $newStockId,
                'body_type' => $request->body_type,
                'chassis_no' => $request->chassis_no,
                'model_grade' => $request->model_grade,
                'slug' => $request->slug,
                'engine_type' => $request->engine_type,
                'drive' => $request->drive,
                'transmission' => $request->transmission,
                'condition' => $request->condition,
                'year_month' => $request->year,
                'color' => $request->color,
                'doors' => $request->doors,
                'seats' => $request->seats,
                'm3' => $request->m3,
                'fob_price' => $request->fob_price,
                'show_cnf_price' => $request->show_cnf_price,
                'fuel' => $request->fuel,
                'mileage' => $request->mileage,
                'cc' => $request->cc,
                'status' => $request->status
            ];

            $car = Car::create($carData); // Create Car instance

            if (!empty($request->images_array)) {
                foreach ($request->images_array as $temp_img_id) {
                    $temp_img = tmp_image::find($temp_img_id);
                    $ext = last(explode('.', $temp_img->name));
                    $car_image = new Item_image();
                    $image_name =  'car' . '-' . $car->id . '-' . Str::random(6) . time() . '.' . $ext; // Access id property of $car
                    $car_image->car_id =  $car->id;
                    $car_image->image = $image_name;
                    $car_image->save();

                    // Copy image to new location
                    $tempImagePath = public_path('temp/' . $temp_img->name);
                    $newImagePath = public_path('images/car/' . $image_name);
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
                'message' => 'Car created successfully.'
            ]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
    public function tempImagesCreate(Request $request)
    {
        $images = $request->file('images');
        $uploadedImages = [];

        foreach ($images as $image) {
            if (!empty($image)) {
                $ext = $image->getClientOriginalExtension();
                $newName = time() . '_' . mt_rand() . '.' . $ext;
                $image->move(public_path('temp'), $newName);

                $tempImage = new tmp_image();
                $tempImage->name = $newName;
                $tempImage->save();



                $uploadedImages[] = [
                    'image_id' => $tempImage->id,
                    'image_path' => asset('temp/' . $newName),
                    'ext' => $ext,
                ];
            }
        }

        return response()->json([
            'status' => true,
            'images' => $uploadedImages,
            'message' => 'Images uploaded successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bodyTypes =  Type::get();
        $car = Car::with('carImages')->find($id);

        // return $car->carImages;

        return view('admin.cars.edit',compact('bodyTypes','car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $car = Car::findOrFail($id);

            // return $request->body_type;
            $validator = Validator::make($request->all(), [
                'body_type' => 'required|integer|max:255',
                'chassis_no' => 'required|max:255',
                'model_grade' => 'required|max:255',
                'slug' => 'required|max:255',
                'show_cnf_price' => 'required|boolean',
                'status' => 'required|boolean',
                'cc' => 'required|integer'
            ]);
            if ($validator->passes()) {
    
               
                $lastStockId = Car::max('stock_id') ?? 3714323372;
                $newStockId = $lastStockId + 1;
                
                $carData = array_merge(
                    ['stock_id' => $newStockId],
                    $request->only([
                        'body_type',
                        'chassis_no',
                        'model_grade',
                        'slug',
                        'engine_type',
                        'drive',
                        'transmission',
                        'condition',
                        'year_month',
                        'color',
                        'doors',
                        'seats',
                        'm3',
                        'fob_price',
                        'show_cnf_price',
                        'fuel',
                        'mileage',
                        'cc',
                        'status'
                    ])
                );
                
                $car->fill($carData); // Fill the car instance with the new data
                $car->save(); // Save the updated car data into the database/ Create Car instance
                
    
                if (!empty($request->images_array)) {
                    foreach ($request->images_array as $temp_img_id) {
                        $temp_img = tmp_image::find($temp_img_id);
                        $ext = last(explode('.', $temp_img->name));
                        $car_image = new Item_image();
                        $image_name =  'car' . '-' . $car->id . '-' . Str::random(6) . time() . '.' . $ext; // Access id property of $car
                        $car_image->image = $image_name;
                        $car_image->car_id =  $car->id;
                        $car_image->save();
        
                        // Copy image to new location
                        $tempImagePath = public_path('temp/' . $temp_img->name);
                        $newImagePath = public_path('images/car/' . $image_name);
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
                    'message' => 'Car created successfully.'
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
    public function destroy(string $id)
    {
        //
    }
    public function delete_item_image(Request $req)
    {
        // Retrieve the image record from the database
        $item_image = Item_image::findOrFail($req->id);
    
        // Check if the image record exists
        if (!empty($item_image)) {
            // Delete the file from storage
            if (!empty($item_image->image)) {
                $imagePath = public_path('images/banner/' . $item_image->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
    
            // Delete the record from the database
            $item_image->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'Image deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Image not found'
            ]);
        }
    }
}
