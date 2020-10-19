@extends('layouts/nav')

@section('css')
<style>
.Cart {
  margin: 50px auto;
}

.Cart__header {
  display: grid;
  grid-template-columns: 3fr 1fr 1fr 1fr 1fr;
  grid-gap: 2px;
  margin-bottom: 2px;
}

.Cart__headerGrid {
  text-align: center;
  background: #f3f3f3;
}

.Cart__product {
  display: grid;
  grid-template-columns: 2fr 7fr 3fr 3fr 3fr 3fr;
  grid-gap: 2px;
  margin-bottom: 2px;
  height: 90px;
}

.Cart__productGrid {
  padding: 5px;
}

.Cart__productImg {
  background-image: url(https://fakeimg.pl/640x480/c0cfe8/?text=Img);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}

.Cart__productTitle {
  overflow: hidden;
  line-height: 25px;
}

.Cart__productPrice,
.Cart__productQuantity,
.Cart__productTotal,
.Cart__productDel {
  text-align: center;
  line-height: 60px;
}

@media screen and (max-width: 820px) {
  .Cart__header {
    display: none;
  }

  .Cart__product {
    box-shadow: 2px 2px 3px 0 rgba(0, 0, 0, 0.5);
    margin-bottom: 10px;
    grid-template-rows: 1fr 1fr;
    grid-template-columns: 2fr 2fr 2fr 2fr 2fr 2fr 1fr;
    grid-template-areas:
      "img title title title title title del"
      "img price price quantity total total del";
  }

  .Cart__productImg {
    grid-area: img;
  }

  .Cart__productTitle {
    grid-area: title;
  }

  .Cart__productPrice,
  .Cart__productQuantity,
  .Cart__productTotal,
  .Cart__productDel {
    line-height: initial;
  }

  .Cart__productPrice {
    grid-area: price;
    text-align: right;
  }

  .Cart__productQuantity {
    grid-area: quantity;
    text-align: left;
  }

  .Cart__productQuantity::before {
    content: "x";
  }

  .Cart__productTotal {
    grid-area: total;
    text-align: right;
    color: red;
  }

  .Cart__productDel {
    grid-area: del;
    line-height: 60px;
    background: #ffc0cb26;
    background-color: red
  }
}



</style>
@endsection
@section('content')
    <div class="container pt-5">
        <div class="Cart py-5">
            <div class="Cart__header">
                <div class="Cart__headerGrid">商品</div>
                <div class="Cart__headerGrid">單價</div>
                <div class="Cart__headerGrid">數量</div>
                <div class="Cart__headerGrid">小計</div>
                <div class="Cart__headerGrid">刪除</div>
            </div>
            @foreach ($items as $item)
                <div class="Cart__product">
                    <div class="Cart__productGrid Cart__productImg"><img src="{{asset('/storage/'.$item->img)}}" alt=""></div>
                    <div class="Cart__productGrid Cart__productTitle">
                        {{$item->name}}
                    </div>
                    <span class="Cart__productGrid Cart__productPrice" data-itemID="{{$item->id}}">{{$item->price}}</span>
                    <div class="Cart__productGrid Cart__productQuantity d-flex">
                        <button id="minus" class="btn btn-small btn-sm btn-minus" data-itemID="{{$item->id}}" style="padding:0">-</button>
                        <span id="qty" class="qty" data-itemID="{{$item->id}}">{{$item->quantity}}</span>
                        <button id="plus" class="btn btn-small btn-sm btn-plus" data-itemID="{{$item->id}}" style="padding:0">+</button>
                    </div>
                    <span class="Cart__productGrid Cart__productTotal" data-itemID="{{$item->id}}">{{$item->price*$item->quantity}}</span>
                    <button id="delete" class="Cart__productGrid Cart__productDel btn btn-sm" data-itemID="{{$item->id}}">&times;</button>
                </div>
            @endforeach
            <a href="/cart_checkout"><button class="btn btn-block btn-dark mt-3">立即結帳</button></a>
        </div>
    </div>
@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-minus').click(function(){
        var cartID = $(this).attr('data-itemID');
        $.ajax({
            method: 'POST',
            url: '/cart_update/'+cartID,
            data: {
                quantity:-1
            },
            success: function (res) {
                // 網頁同步數量減少
                var old_value = $(`.qty[data-itemID="${cartID}"]`).text();
                var new_value = Math.max(parseInt(old_value) - 1 , 1);
                $(`.qty[data-itemID="${cartID}"]`).text(new_value);
                // 網頁同步價錢變動
                var old_total = $(`.Cart__productTotal[data-itemID="${cartID}"]`).text();
                var price = $(`.Cart__productPrice[data-itemID="${cartID}"]`).text();
                var new_total = Math.max(parseInt(old_total) - parseInt(price),parseInt(price));
                $(`.Cart__productTotal[data-itemID="${cartID}"]`).text(new_total);
            },
        });
    })
    $('.btn-plus').click(function(){
        var cartID = $(this).attr('data-itemID');
        $.ajax({
            method: 'POST',
            url: '/cart_update/'+cartID,
            data: {
                quantity:1
            },
            success: function (res) {
                var old_value = $(`.qty[data-itemID="${cartID}"]`).text();
                var new_value = parseInt(old_value) + 1;
                Math.max(new_value,0);
                $(`.qty[data-itemID="${cartID}"]`).text(new_value);
                var old_total = $(`.Cart__productTotal[data-itemID="${cartID}"]`).text();
                var price = $(`.Cart__productPrice[data-itemID="${cartID}"]`).text();
                var new_total = parseInt(old_total) + parseInt(price);
                $(`.Cart__productTotal[data-itemID="${cartID}"]`).text(new_total);
            },

        });
    });
    $('.Cart__productDel').click(function(){
        var cartID = $(this).attr('data-itemID');
        var r=confirm("確定要將商品移出購物車嗎?")
        if(r==true){
            $.ajax({
                method: 'POST',
                url: '/cart_delete/'+cartID,
                data: {},
                success: function (res) {
                    window.location.reload();
                },
            });
        };
    });


    // $('.Cart__productDel').click(function(){
    //     var id = $(this).attr('data-itemID');
    //     console.log(id);
    // })



</script>
@endsection
