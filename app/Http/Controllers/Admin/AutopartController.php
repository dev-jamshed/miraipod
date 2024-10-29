<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autopart;

class AutopartController extends Controller
{
    public function index(){
        $data = Autopart::all();
        return view('admin.autoparts.index',compact('data'));
    }

    public function create(){
        return view('admin.autoparts.create');
    }
    
    public function edit($id){
        $data = Autopart::find($id);
        return view('admin.autoparts.edit',compact('data'));
    }

    // public function show($id){
        
    //     $data = Autopart::find($id);
    //     return view('admin.autoparts',compact('data'));
    // }

    public function store(Request $req){
        $table = new Autopart();
        $table->title = $req->title;
        $table->short_description = $req->short_description;
        $table->long_description = $req->long_description;

        $imgPaths = [];
        $destinationPath = public_path('/uploads/autoparts/images');
        
        for ($i = 1; $i <= 3; $i++) {
            if ($req->hasFile("img_$i")) {
                $imgPaths["img_$i"] = $this->uploadImage($req->file("img_$i"), $destinationPath);
            }
        }

        $table->img_1 =  $imgPaths['img_1'] ?? '';
        $table->img_2 =  $imgPaths['img_2'] ?? '';
        $table->img_3 =  $imgPaths['img_3'] ?? '';

        
        if($table->save()){
            return redirect()->route('admin.autoparts.index')->with('success','Record Add Successfully');
        }
        
        
        return view('technical error');
    }

    public function update(Request $req, $id){
        $table = Autopart::find($id);
        
        if (!$table) {
            return redirect()->route('admin.autoparts.index')->with('error', 'Autopart not found.');
        }
        
        $table->title = $req->title;
        $table->short_description = $req->short_description;
        $table->long_description = $req->long_description;
    
        $imgPaths = [];
        $destinationPath = public_path('/uploads/autoparts/images');
        
        for ($i = 1; $i <= 3; $i++) {
            if ($req->hasFile("img_$i")) {
                $imgPaths["img_$i"] = $this->uploadImage($req->file("img_$i"), $destinationPath);
            }
        }
    
        // Update image paths only if new files are uploaded
        if (isset($imgPaths['img_1'])) {
            $table->img_1 = $imgPaths['img_1'];
        }
        if (isset($imgPaths['img_2'])) {
            $table->img_2 = $imgPaths['img_2'];
        }
        if (isset($imgPaths['img_3'])) {
            $table->img_3 = $imgPaths['img_3'];
        }
    
        if($table->save()){
            return redirect()->route('admin.autoparts.index')->with('success', 'Autopart updated successfully.');
        }
    
        return view('technical error');
    }


    public function destroy($id) {
        $table = Autopart::find($id);
    
        if (!$table) {
            return redirect()->route('admin.autoparts.index')->with('error', 'Autopart not found.');
        }
    
        // Delete associated images if they exist
        $imagePaths = [$table->img_1, $table->img_2, $table->img_3];
        foreach ($imagePaths as $imagePath) {
            if ($imagePath && file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        // Delete the autopart record from the database
        if ($table->delete()) {
            return redirect()->route('admin.autoparts.index')->with('success', 'Autopart deleted successfully.');
        }
    
        return view('technical error');
    }
    

    public function uploadImage($file, $destinationPath) {
        // Get the original file name
        $originalName = $file->getClientOriginalName();
        
        // Append the current timestamp to the file name to make it unique
        $fileName = $originalName. '_' . time() . '.' . $file->getClientOriginalExtension();
    
        // Move the file to the destination path
        $file->move($destinationPath, $fileName);

        // dd($destinationPath);
    
        // Return the full path of the uploaded file
        return '/uploads/autoparts/images/'.$fileName;
    }
}
