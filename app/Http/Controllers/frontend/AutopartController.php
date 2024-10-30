<?php

namespace App\Http\Controllers\frontend;

use App\Models\Autopart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AutoPartsDescription;

class AutopartController extends Controller
{
    public function index(){
        $data = Autopart::select('long_description', 'img_1', 'img_2', 'img_3')->get();
        $AutoPartsDescription = AutoPartsDescription::find(1);
        return view('frontend.autoparts', compact('data','AutoPartsDescription'));
    }
    

    public function show($id){
    
        $data = Autopart::find($id);
        return view('frontend.autopart_show',compact('data'));
    }
}
