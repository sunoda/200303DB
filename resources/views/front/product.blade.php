@extends ('layouts/nav')

@section ('content')

<section class="mbr-gallery mbr-slider-carousel cid-rRCt2hARck" id="gallery2-9">
    <div class="container">
        <div>
            <!-- Filter -->
            <div class="mbr-gallery-filter container gallery-filter-active">
                <ul buttons="0">
                    <li class="mbr-gallery-filter-all">
                        <a class="btn btn-md btn-primary-outline active display-7" href="">All</a>
                    </li>
                </ul>
            </div>
            <!-- Gallery -->
            <div class="mbr-gallery-row">
                <div class="mbr-gallery-layout-default"><div>
                    <div>
                        @foreach ($products as $item)
                        <div class="mbr-gallery-item mbr-gallery-item--p2" data-video-url="false" data-tags="{{$item->tag}}">
                            <div href="#lb-gallery2-9" data-slide-to="0" data-toggle="modal">
                                <img src="{{$item->img}}" alt="" title="">
                                <span class="icon-focus"></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Lightbox -->
        <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery2-9">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel-inner">
                            @foreach ($products as $item)
                            <div class="carousel-item active">
                                <img src="{{$item->img}}" alt="" title="">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery2-9">
                            <span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery2-9">
                            <span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <a class="close" href="#" role="button" data-dismiss="modal">
                            <span class="sr-only">Close</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
