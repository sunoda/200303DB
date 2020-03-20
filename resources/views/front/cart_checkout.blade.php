@extends('layouts/nav')

@section('css')
<style>
.Cart {
  margin: 50px auto;
}

.Cart__header {
  display: grid;
  grid-template-columns: 3fr 1fr 1fr 1fr;
  grid-gap: 2px;
  margin-bottom: 2px;
}

.Cart__headerGrid {
  text-align: center;
  background: #f3f3f3;
}

.Cart__product {
  display: grid;
  grid-template-columns: 2fr 7fr 3fr 3fr 3fr;
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
    grid-template-columns: 2fr 2fr 2fr 2fr 2fr 2fr;
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
            </div>
            @foreach ($items as $item)
                <div class="Cart__product">
                    <div class="Cart__productGrid Cart__productImg"><img src="{{asset('/storage/'.$item->img)}}" alt=""></div>
                    <div class="Cart__productGrid Cart__productTitle">
                        {{$item->name}}
                    </div>
                    <div class="Cart__productGrid Cart__productPrice">{{$item->price}}</div>
                    <div class="Cart__productGrid Cart__productQuantity d-flex">
                        <span id="qty" class="qty" data-itemID="{{$item->id}}">{{$item->quantity}}</span>
                    </div>
                    <div class="Cart__productGrid Cart__productTotal">{{$item->price*$item->quantity}}</div>
                </div>
            @endforeach
            <div class="Cart__header">
                <div class="Cart__headerGrid"></div>
                <div class="Cart__headerGrid"></div>
                <div class="Cart__headerGrid"></div>
                <div class="Cart__headerGrid">
                    <div>運費：@if(Cart::getTotal() > 30000)免運費 @else 120元 @endif</div>
                    <?php
                        if (Cart::getTotal() > 30000) {
                            $total_price = Cart::getTotal();
                        } else {
                            $total_price = Cart::getTotal()+120;
                        }
                    ?>
                    <div>總計：{{$total_price}} 元</div>
                </div>
            </div>
            <h2 class="mt-5">收件人資訊</h2>
            <form action="/cart_checkout" method="post">
                @csrf
                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">　姓名　</span>
                    </div>
                    <input type="text" class="form-control" name="recipient_name">
                </div>
                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">　電話　</span>
                    </div>
                    <input type="tel" class="form-control" name="recipient_phone" >
                </div>
                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">　地址　</span>
                    </div>
                    <input type="text" class="form-control" name="recipient_address">
                </div>
                <div class="input-group input-group-lg my-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" >送貨時段</span>
                    </div>
                    <input type="text" class="form-control" name="shipment_time">
                </div>
                <button type="submit" class="btn btn-primary">前往結帳</button>
            </form>
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
    </script>
@endsection
