<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Car;
use App\Models\Admin\Type;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars =  Car::get();
        return view('admin.cars.index' , compact('cars'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bodyTypes =  Type::get();
        return view('admin.cars.create',compact('bodyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body_type' => 'required|max:255',
            'chassis_no' => 'required|max:255',
            'model_grade' => 'required|max:255',
            'slug' => 'required|max:255',
            'show_cnf_price' => 'required|boolean',
            'status' => 'required|boolean',
            'cc' => 'required|integer'
        ]);
        if ($validator->passes()) {
            $stockId = Str::uuid()->toString();
            // return $stockId;
            Car::create([
                'stock_id' => $stockId,
                'body_type' => $request->body_type,
                'chassis_no' => $request->chassis_no,
                'model_grade' => $request->model_grade,
                'slug' => $request->slug,
                'engine_type' => $request->engine_type,
                'drive' => $request->drive,
                'transmission' => $request->transmission,
                'condition' => $request->condition,
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
            ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
