@extends('layouts/app')
@section('content')

<div class="container">
    <h2>修改商品</h2>
    <form method="POST" action="/home/product/update/{{$products->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img">圖片</label><br>
            <img src="{{asset('/storage/'.$products->img)}}" class="img-fluid mb-4" width=50% alt="">
            <input type="file" class="form-control" id="img" name="img">
        </div>
        <div class="form-group">
            <label for="type">類型</label>
        <input type="text" class="form-control" id="type" name="type" value="{{$products->type}}" required>
        </div>
        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$products->title}}" required>
        </div>
        <div class="form-group">
            <label for="content">內文</label>
            <textarea type="text" class="form-control" id="content" name="content" required>{{$products->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="sort">權重</label>
            <input type="number" class="form-control" id="sort" name="sort" value="{{$products->sort}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
