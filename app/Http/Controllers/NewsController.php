<?php

namespace App\Http\Controllers;
use App\News;
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
        News::create($news_data);
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
        $request_data = $request;
        $item = News::find($id);

        if($request->hasFile('img')){
            // 刪除原有圖片
            Storage::disk('public')->delete($item->img);

            // $file = $request->file('img');
            // $path = $this->fileUpload($file,'news');
            // $request_data['img'] = $path;
            $file_name = $request->file('img')->store('','public');
            // $request['img'] = $file_name;
            // dd($request_data['img']->path());
            $request_data['img']->path() = $file_name;

        }
        $item->update($request->all());
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
}
