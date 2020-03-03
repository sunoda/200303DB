@extends('layouts/app')
@section('content')

<div class="container">
    <h2>修改最新消息</h2>
<form method="POST" action="/home/news/update/{{$news->id}}">
        @csrf
        <div class="form-group">
          <label for="img">Img</label>
          <input type="text" class="form-control" id="img" name="img" value={{$news->img}}>
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value={{$news->title}}>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
        <textarea type="text" class="form-control" id="content" name="content">{{$news->content}}</textarea>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
