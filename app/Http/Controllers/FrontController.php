<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front/index');
    }
    public function gallery(){
        return view('front/gallery');
    }
    public function news(){
        return view('front/news');
    }
}
