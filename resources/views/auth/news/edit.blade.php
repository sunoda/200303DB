@extends('layouts/app')

@section('content')
<div class="container">
    <h2>修改最新消息</h2>
<form method="POST" action="/home/news/update/{{$news->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h2>原始圖片</h2>
            <br>
            <img class="col-5"src="{{asset('/storage/'.$news->img)}}" alt="">
          <hr>
          <hr>
            <h2>多張圖片組</h2>
            <br>
            <div class="row">
                @foreach ($news->news_img as $item)
                    <div class="col-3">
                        <button class="btn btn-danger">X</button>
                        <img class="img-fluid" src="{{asset('/storage/'.$item->news_img_url)}}" alt="">
                        <input type="number" min='0' class="form-control" id="sort" name="sort" value="{{$item->sort}}">
                    </div>
                @endforeach
            </div>
          <hr>

          <label for="img">Img</label>
          <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value={{$news->title}}>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
        <textarea type="text" class="form-control" id="content" name="content">{{$news->content}}</textarea>
          </div>
          <div class="form-group">
            <label for="sort">sort</label>
        <input type="number" min='0' class="form-control" id="sort" name="sort" value="{{$news->sort}}">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
