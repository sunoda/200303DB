@extends('layouts/app')
@section('content')

<div class="container">
    <h2>新增最新消息</h2>
    <form method="POST" action="/home/news/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="img">MainImg</label>
          <input type="file" class="form-control" id="img" name="img" required>
        </div>
        <div class="form-group">
            <label for="news_img">Img</label>
            <input type="file" class="form-control" id="news_img" name="news_img[]" multiple>
          </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" id="content" name="content" required>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
