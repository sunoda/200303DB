@extends('layouts/nav')
@section('content')
<section class="features3 cid-rS8CGfPRx1" id="features3-3">
    <div class="container" style="padding: 200px 0 100px">
        <div class="media-container-row d-flex flex-wrap">
            @foreach ($news as $item)
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="{{asset('/storage/'.$item->img)}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            {{$item->title}}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {!!$item->content!!}
                        </p>
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="/news/{{$item->id}}" class="btn btn-primary display-4">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>
@endsection
