@extends('layouts/app')
@section('content')

<div class="container">
    <h2>新增商品</h2>
    <form method="POST" action="/home/product_types/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="type">商品類型</label>
          <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="form-group">
          <label for="sort">權重</label>
          <input type="number" min="0" class="form-control" id="sort" name="sort" value="0">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
