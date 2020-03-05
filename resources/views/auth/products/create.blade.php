@extends('layouts/app')
@section('content')

<div class="container">
    <h2>新增商品</h2>
    <form method="POST" action="/home/product/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="img">Img</label>
          <input type="file" class="form-control" id="img" name="img" required>
        </div>
        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" id="tag" name="tag" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
