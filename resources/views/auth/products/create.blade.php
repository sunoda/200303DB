@extends('layouts/app')
@section('content')

<div class="container">
    <h2>新增商品</h2>
    <form method="POST" action="/home/product/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img">圖片</label>
            <input type="file" class="form-control" id="img" name="img" required>
        </div>
        <div class="form-group">
            <label for="type">類型</label>
            <select class="form-control" id="type" name="type" required>
            @foreach ($product_types as $item)
            <option value="{{$item->type}}">{{$item->type}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">內文</label>
            <textarea type="text" class="form-control" id="content" name="content" required></textarea>
        </div>
        <div class="form-group">
            <label for="sort">權重</label>
            <input type="number" class="form-control" id="sort" name="sort" value="0">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
