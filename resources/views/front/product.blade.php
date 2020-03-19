@extends ('layouts/nav')

@section ('content')

<section class="services1 cid-rTybThO41Q" id="services1-2">
    <!---->

    <!---->
    <!--Overlay-->

    <!--Container-->
    <div class="container">
        <div class="row justify-content-center">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-left pb-3 mbr-fonts-style display-1">
                    Our Shop
                </h2>

            </div>
            @foreach ($products as $item)
                <div class="card col-12 col-md-6 p-3 col-lg-4">
                    <div class="card-wrapper">
                        <div class="card-img">
                            <img src="{{asset('/storage/'.$item->img)}}" alt="">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style display-5">
                                {{$item->title}}
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium dolores doloribus
                                eligendi eum illo placeat quis repellendus sequi tempore!
                            </p>
                            <!--Btn-->
                            <div class="mbr-section-btn align-left">
                                <a href="/product/{{$item->id}}" class="btn btn-warning-outline display-4">
                                    ${{$item->price}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
