<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = AboutUs::first();
        // return view('frontend.blogs',compact('data','categories','recent_blogs'));
        return view('admin.about-us.index',compact('data'));
    }

    // public function create()
    // {
    //     return view('admin.about-us.create');
    // }

    // public function store(Request $request)
    // {
    //    $table = new AboutUs();
    //    $table->title = $request->title;
    //    $table->description = $request->description;       
    //    //image uploading
    //    $imageName = 'uploads/'.time().'.'.$request->image->extension();
    //    $request->image->move(public_path('uploads'),$imageName);
    //    $table->image = $imageName;
        
    //    if($table->save()){
    //        return redirect()->route('about.index');
    //     }
    
    //     return 'Technial issue' ;
    // }

    public function show($id)
    {
        $data = AboutUs::find($id);
        return view('admin.about-us.show',compact('data'));
        // return view('frontend.blogview',compact('data'));
    }

    public function edit($id)
    {
        $data = AboutUs::find($id);
       
        return view('admin.about-us.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $table = AboutUs::find($id);

        $table->title = $request->title;
        $table->description = $request->description;

        if($request->hasFile('image')){
            if(File::exists(public_path($table->image))){
                File::delete(public_path($table->image));
            }
            //image uploading
            $imageName = 'uploads/'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'),$imageName);
            $table->image = $imageName;
        }
        
       
         
        if($table->save()){
            return redirect()->route('about.index')->with('success', 'About has been Updated');
        }
     
        return 'Technial issue uploading image' ;
    }
}
