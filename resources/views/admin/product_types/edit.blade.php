@extends('layouts/app')
@section('content')

<div class="container">
    <h2>修改商品類型</h2>
<form method="POST" action="/home/product_types/update/{{$product_types->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="type">商品類型</label>
          <input type="text" class="form-control" id="type" name="type" value={{$product_types->type}}>
        </div>
        <div class="form-group">
          <label for="sort">權重</label>
          <input type="text" class="form-control" id="sort" name="sort" value={{$product_types->sort}}>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
