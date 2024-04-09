<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Make;
use Illuminate\Http\Request;
use App\Models\Admin\CarsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $query = CarsModel::with('make')
            ->latest('id');

        if ($req->has('keyword')) {
            $query->where('name', 'like', '%' . $req->input('keyword') . '%');
        }

        $models = $query->paginate(10);

        return view('admin.models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makes = Make::orderBy('name', 'ASC')->get();
        $data['makes'] = $makes;
        return view('admin.models.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:models,slug',
            'status' => 'required',
            'make' => 'required'
        ]);
        if ($validator->passes()) {
            $CarsModel = new CarsModel();
            $CarsModel->make_id =  $request->make;
            $CarsModel->status =  $request->status;
            $CarsModel->name  =  $request->name;
            $CarsModel->slug  =  $request->slug;
            // $CarsModel->showOnHome =  $req->showOnHome;
            $CarsModel->save();


            // $request->session()->flash('success', 'Sub Category added successfully');
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
        $model = CarsModel::find($id);
        $Makes = Make::orderBy('name','ASC')->get();
        if(empty($model)){
        session()->flash('error','Recorde not Found');
            return redirect()->route('admin.model.index');
        };
        $data['model'] = $model;

        $data['Makes'] = $Makes;
        return view('admin.models.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = CarsModel::find($id);

        if(empty($model)){
            return redirect()->route('admin.model.index');
            session()->flash('error','Recorde not Found');
        };

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:models,slug,'.$id.',id',
            'status' => 'required',
            'make' => 'required'
        ]);
        if($validator->passes()){

            $model->make_id =  $request->make;
            $model->status =  $request->status;
            $model->name  =  $request->name;
            $model->slug  =  $request->slug;
            // $subCategory->showOnHome =  $req->showOnHome;
            $model->save();

            Session()->flash('success','Sub Category Edit successfully');
            return response()->json([
                'status' => true,
                'message' => 'Sub Category Edit successfully'
            ]);
         }
         else{
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
        $fob = CarsModel::find($id);
        if (empty($fob)) {
            Session()->flash('error', 'Model Deleted Failed');
            return redirect()->route('admin.model.index');
        };
        $fob->delete();

        Session()->flash('success', 'Fob Deleted successfully');
        return response()->json([
            'status' => true,
            'errors' => "model Deleted successfully"
        ]);
    }
}
