@extends('layouts/app')
@section('content')

<div class="container">
    <h2>修改商品</h2>
<form method="POST" action="/home/product_types/update/{{$product_types->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="img">Img</label>
          <input type="file" class="form-control" id="img" name="img" value={{$product_types->type}}>
        </div>
        <div class="form-group">
          <label for="tag">Title</label>
          <input type="text" class="form-control" id="tag" name="tag" value={{$product_types->sort}}>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
