<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front/index');
    }
    public function product(){
        return view('front/product');
    }
    public function news(){
        return view('front/news');
    }
}
