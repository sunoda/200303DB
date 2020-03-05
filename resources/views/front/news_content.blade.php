@extends('layouts/nav')
@section('content')
<section class="features3 cid-rS8CGfPRx1" id="features3-3">
    <div class="container" style="padding: 200px 0 100px">
        <div class="media-container-row d-flex flex-wrap">

            <img width="200" src="{{asset('/storage/'.$news->img)}}" alt="">

            @foreach ($news->news_img as $item)
                <img width="200" src="{{asset('/storage/'.$item->news_img_url)}}" alt="">
            @endforeach
        </div>
    </div>
</section>
@endsection
