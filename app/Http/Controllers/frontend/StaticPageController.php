<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    function about(){
        return view('frontend.about');
    }
    function contact(){
        return view('frontend.contact');
    }
    function faq(){
        return view('frontend.faq');
    }
}
