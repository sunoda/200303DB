<?php
namespace App\Http\Controllers;
use App\News;
use App\Products;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front/index');
    }
    public function product()
    {
        $products = Products::all()->sortByDesc('sort');
        return view('front/product',compact('products'));
    }
    public function news()
    {
        $news = News::all()->sortByDesc('sort');
        return view('front/news', compact('news'));
    }
}
