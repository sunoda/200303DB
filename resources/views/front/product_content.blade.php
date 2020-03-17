@extends('layouts/nav')

@section('css')
<style>
    .color , .capacity{
        padding: 10px 20px;
        /* width: 160px; */
        min-height: 58px;
        height: 100%;
        font-size: 16px;
        line-height: 20px;
        color: #757575;
        text-align: center;
        border: 1px solid #eee;
        background-color: #fff;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: opacity, border .2s linear;
        cursor: pointer;
    }

    .color.active , .capacity.active{
        color: #424242;
        border-color: #ff6700;
        transition: opacity, border .2s linear;
    }

    .type_list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        min-height: 58px
    }

    ul,
    li {
        list-style-type: none;
        padding: 0;
    }
</style>
@endsection

@section('content')
{{-- <section class="cid-rRCt2hARck">
    <div class="container">
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6 row">
                <div class="col-4">
                    <div class="color">
                        藍
                    </div>
                </div>
                <div class="col-4">
                    <div class="color">
                        紅
                    </div>
                </div>
                <div class="col-4">
                    <div class="color">
                        橙
                    </div>
                </div>
                <div class="col-4">
                    <div class="color">
                        紫
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="cid-rRCt2hARck">
    <div class="container">
        <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6">
                <div class="product_title">
                    <h2 id="title" data-title="Redmi Note 8T">Redmi Note 8T</h2>
                    <div>3GB+32GB, 星際藍</div>
                    <div>NT$4,599</div>
                </div>
                <div class="product_tips">
                    icon 雙倍 該商品可享受雙倍積分
                </div>
                <div class="product_capacity">
                    <h3>容量</h3>
                    <ul class="type_list">
                        <li class="type">
                            <div class="capacity active"  data-capacity="3GB+32GB">3GB+32GB</div>
                        </li>
                        <li class="type">
                            <div class="capacity" data-capacity="4GB+64GB">4GB+64GB</div>
                        </li>
                    </ul>
                </div>

                <div class="product_color">
                    <ul class="type_list">
                        <li class="type">
                            <div class="color" name="color" data-Color="藍">
                                藍
                            </div>
                        </li>
                        <li class="type">
                            <div class="color active" name="color" data-Color="紅">
                                紅
                            </div>
                        </li>
                        <li class="type">
                            <div class="color" name="color" data-Color="橙">
                                橙
                            </div>
                        </li>
                        <li class="type">
                            <div class="color" name="color" data-Color="紫">
                                紫
                            </div>
                        </li>
                        {{-- <input type="text" id='selectColor' value="紅" hidden> --}}
                    </ul>
                </div>
                <form method="POST" action="/add_cart">
                    @csrf
                    <div class="product_qty">
                        <a id="minus" href="#">-</a>
                        <input type="number" id="value" name="qty" value="1">
                        <a id="plus" href="#">+</a>
                    </div>

                    <div class="product_total">
                        <input type="text" id="capacity" name="capacity" value="3GB+32GB" hidden>
                        <input type="text" id="selectColor" name="selectColor" value="紅" hidden>
                        <span id="total"></span>
                    </div>
                    <span id="total"></span>
                    <button type="submit">立即購買</button>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection


@section('js')
<script>

        // $('.col-4 .color').click(function(){
        //     $('.col-4 .color').removeClass('active');
        //     $(this).addClass('active');
        // })

        $('.type .color').click(function(){
            $('.type .color').removeClass('active');
            $(this).addClass('active');
            var color = $(this).attr('data-Color');
            $('#selectColor').val(color);
        })

        $('.type .capacity').click(function(){
            $('.type .capacity').removeClass('active');
            $(this).addClass('active');
            var capacity = $(this).attr('data-capacity');
            $('#capacity').val(capacity);
        })

        $(function(){
            var valueElement = $('#value');
            function incrementValue(e){
                $('#value').val(Math.max(parseInt($('#value').val()) + e.data.increment, 0))
                return false;
            }
            $('#plus').bind('click', {increment: 1}, incrementValue);
            $('#minus').bind('click', {increment: -1}, incrementValue);

        });
        var title = $('#title').attr('data-title');
        var capacity = $('.capacity.active').attr('data-capacity');
        var qty = $('#value').attr('value');
        var text = $('#total').text(title + ' ' + capacity + '*' + qty);
        console.log($('.capacity.active').attr('data-capacity'));

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


</script>
@endsection
