@extends('layouts/nav')

@section('css')
<style>
    .shopping_wrapper {
        margin: 100px 20px;
        padding: 10px 10px 10px 10px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.8);
        border-radius: 5px 5px;
        background: rgba(255, 255, 255, 0.5);

    }
    .shopping_cart_header {
        padding-bottom: 20px;
        text-align: center;
    }
    .cart_items {
        display: grid;
        grid-template-columns:
            100px minmax(300px, 1fr) minmax(50px, 100px) minmax(50px, 100px) 100px;
        grid-auto-flow: dense;
        grid-template-areas:
            "item_image item_description item_nights item_total"
            "sub_total sub_total sub_total sub_total";

        grid-gap: 5px;

        padding: 10px 10px 10px 1px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.8);
        border-radius: 5px 5px;
        background: rgba(255, 255, 255, 0.5);

        left: 0%;
        -moz-transition: all .75s ease;
        -webkit-transition: all .75s ease;
        -o-transition: all .75s ease;
        transition: all .75s ease;
    }
    .animate_delete_cart_item {
        /* Animate the item being removed from the shopping cart */
        opacity: 0;
        left: -100%;
        margin-top: -100px;
    }
    .animate_delete_cart_item_mobile {
        /* Animate the item being removed from the shopping cart */
        opacity: 0;
        left: -100%;
        margin-top: -350px;
    }
    .cart_item_description {
        display: grid;
        grid-template-columns: repeat(auto-fit, 1fr);
        grid-gap: 10px;
    }
    .item_lot_number {
        grid-column: span 3;
    }
    .totals {
        display: grid;
        grid-template-columns: 1fr 130px;
        text-align: right !important;
        grid-gap: 5px;
        padding: 5px;
        font-size: 16pt;
    }
    .cart_item_image {
        padding: 5px;
    }
    .cart_item_total {
        padding: 5px;
        text-align: right;
        align-self: center;
    }
    .cart_item_total,
    .cart_item_nights {
        font-size: 20px;
    }
    .remove_chart_item {
        color: rgb(191, 9, 9);
        background: transparent;
        border: none;
        font-size: 20pt;
        padding: 10px;

        -moz-transition: background-color 0.3s ease;
        -webkit-transition: background-color 0.3s ease;
        -o-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;
    }
    .remove_chart_item:hover {
        background-color: rgba(221, 29, 29, 0.1);
        border-radius: 5px;
    }
    .shopping_cart_checkout {
        margin-top: 20px;
        float: right;
        width: 220px;
        height: 50px;
        border: none;
        border: solid 2px rgb(13, 95, 2);
        color: rgb(13, 95, 2);
        border-radius: 5px;
        background: rgba(255, 255, 255, 0);
        font-size: 25px;

        -moz-transition: background-color 0.3s ease;
        -webkit-transition: background-color 0.3s ease;
        -o-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;
    }
    .shopping_cart_checkout:hover {
        background: rgb(13, 95, 2);
        color: white;
    }
    @media (max-width: 850px) {
        .cart_items {
            grid-template-columns: 1fr;
            grid-template-areas:
                "item_image"
                "item_description"
                "item_nights"
                "item_total";
            grid-gap: 0px;
            padding: 5px;
            margin-bottom: 5px;
            /* text-align: center; */
        }
        .cart_item_total,
        .cart_item_nights {
            text-align: center;
            font-size: 25px;
            padding: 10px;
            background-color: #f2f2f2;
        }
        .cart_item_description {
            grid-template-columns: 1fr 1fr;
            text-align: center;
        }
        .item_lot_number {
            text-align: center;
            grid-column: span 2;
        }
        .cart_item_description {
            padding-bottom: 10px;
        }
        .shopping_cart_checkout {
            width: 100%;
        }
    }
    .cart_item_image {
        grid-area: item_image;
        text-align: center;
    }
    .cart_item_description {
        grid-area: item_description;
        width: 100%;
    }
    .cart_item_nights {
        grid-area: item_nights;
        padding: 5px;
        text-align: center;
        align-self: center;
    }
    .cart_item_total {
        grid-area: item_total;
    }
    .sub_total {
        grid-area: sub_total;
    }
    .item_extras {
        background-color: cadetblue;
        grid-area: item_extras;
    }
</style>
@endsection
@section('content')
<div class="shopping_wrapper">
    <div class="shopping_cart_header">
        <h2>Shopping Cart</h2>
    </div>
    <div class="cart_items">
        <span class="cart_item_image">
            <img src="https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png" alt="lot">
        </span>
        <div class="cart_item_description">
            <span class="item_lot_number">
                <strong>Lot number:1 #####</strong>
            </span>
            <span>名稱</span>
            <span>單價</span>
            <span>數量</span>
            <span>數量</span>
            <span>數量</span>
            <span>數量</span>

        </div>
        <span class="cart_item_nights">2 night(s)</span>
        <span class="cart_item_total">$999,9</span>
        <button id="delete-LOTID" type="button" class="remove_chart_item glyphicon glyphicon-remove-sign"
            onclick="EVT.emit('cart_deleteItem',event,true)"></button>
    </div>

    <br>
    <div class="totals">
        <span>Subtotal:</span>
        <span>$9,999.99</span>
    </div>
    </div>
    <div class="totals">
        <strong>Total:</strong>
        </>
        <strong>$9,999.99</strong>
    </div>
    <div>
        <button class="shopping_cart_checkout">Checkout</button>
    </div>
</div>
</div>

@endsection

@section('js')
<script>
    $("button").on('click',function(event){

    if($(event.target).closest('.cart_items').height()<150){
                //desktop view
                $(event.target).closest('.cart_items').addClass('animate_delete_cart_item');
            }
            else{
                //mobile view
                $(event.target).closest('.cart_items').addClass('animate_delete_cart_item_mobile');

            }

            //remove item once animation done.
            setTimeout (function(){
                //remove item
                $(event.target).closest('.cart_items').remove();
                },600);
    })
</script>
@endsection
