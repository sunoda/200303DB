<?php

namespace App\Http\Controllers;
use App\Products;
use App\ProductTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::find('type');
        return view('auth.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type = ProductTypes::all();
        return view('auth.products.create', compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_data = $request -> all();
        // 上傳檔案
        $file_name = $request ->file('img')->store('','public');
        $product_data['img'] = $file_name;

        Products::create($product_data);
        return redirect('/home/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        return view('auth.products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_data = $request->all();
        $item = Products::find($id);

            // 判斷是否有更新圖片
        if($request->hasFile('img')){
            // 刪除原有圖片
            Storage::disk('public')->delete($item->img);
            // 上傳新的圖片
            $file_name = $request->file('img')->store('','public');
            $request_data['img'] = $file_name;
        }
            // 更新資料
        $item->update($request_data);
        return redirect('/home/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Products::find($id);
        $origin_img = $item->img;
        if(Storage::disk('public')->exists($origin_img)){
        Storage::disk('public')->delete($origin_img);
        }
        $item->delete();
        return redirect('home/product');
    }
}
