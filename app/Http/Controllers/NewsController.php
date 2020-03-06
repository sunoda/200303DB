<?php

namespace App\Http\Controllers;
use App\News;
use App\News_imgs;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all()->sortByDesc('sort');
        return view('auth.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news_data = $request -> all();
        // 上傳檔案
        $file_name = $request->file('img')->store('','public');
        $news_data['img'] = $file_name;
        $optionimg = News::create($news_data);

        $files = $request->file('news_img');
        foreach ($files as $img_file){
            $path = $img_file->store('','public');

            $news_imgs = new News_imgs;
            $news_imgs->news_id = $optionimg->id;
            $news_imgs->news_img_url = $path;
            $news_imgs->save();
        }
        return redirect('/home/news');
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
        $news = News::find($id);
        return view('auth.news.edit', compact('news'));
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
        dd($request->all());
        $request_data = $request->all();
        $item = News::find($id);
            // 判斷是否有更新圖片
        if($request->hasFile('img')){
            // 刪除原有圖片
            Storage::disk('public')->delete($item->img);
            // 上傳新的圖片
            $file_name = $request->file('img')->store('','public');
            $request_data['img'] = $file_name;
            }
        $item->update($request_data);

        $optionimg = News::find($id);
        $files = $request->file('news_img');
        foreach ($files as $img_file){
            $path = $img_file->store('','public');
            $news_img = new News_imgs;
            $news_img->news_id = $optionimg->id;
            $news_img->news_img_url = $path;
            $news_img->save();
        }

        return redirect('/home/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = News::find($id);
        $origin_img = $item->img;
        if(Storage::disk('public')->exists($origin_img)){
        Storage::disk('public')->delete($origin_img);
        }
        $item->delete();
        return redirect('/home/news');
    }

    // ajax function
    public function ajax_delete_img(Request $request){

        $id = $request->imgDelete;

        $item = News_imgs::find($id);
        $origin_img = $item->news_img_url;
        if(Storage::disk('public')->exists($origin_img)){
            Storage::disk('public')->delete($origin_img);
        }
        $item->delete();
        return $id;
    }
    public function ajax_sort(Request $request)
    {
        $sort = $request->sort;
        $id = $request->img_id;

        $img = News_imgs::find($id);
        $img->sort = $sort;
        $img->save();

        return $img->sort;
    }
}
