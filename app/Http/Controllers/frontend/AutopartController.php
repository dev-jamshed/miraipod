<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autopart;

class AutopartController extends Controller
{
    public function index(){
        $data = Autopart::all();
        return view('frontend.autoparts',compact('data'));
    }

    public function show($id){
        $data = Autopart::find($id);
        return view('frontend.autopart_show',compact('data'));
    }
}
