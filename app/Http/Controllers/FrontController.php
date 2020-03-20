<?php
namespace App\Http\Controllers;
use App\News;
use App\Orders;
use App\Contact;
use App\Products;
use Carbon\Carbon;
use App\OrderDetails;
use App\Mail\SendToUser;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use TsaiYiHua\ECPay\Services\StringService;

class FrontController extends Controller
{
    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    // 首頁
    public function index()
    {
        return view('front/index');
    }
        // 最新消息頁面
    public function news()
    {
        $news = News::all()->sortByDesc('sort');
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent()->sort();
        return view('front/news', compact('news','items'));
    }
    public function news_content($id)
    {
        $news = News::with('news_img')->find($id);
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent()->sort();
        return view('front/news_content', compact('news','items'));
    }
    // 商品頁面
    public function product()
    {
        $products = Products::all()->sortByDesc('sort');
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent()->sort();
        return view('front/product',compact('products','items'));
    }
    public function Product_content($productID){

        $product = Products::find($productID);
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent()->sort();
        return view('front/product_content', compact('product','items'));
    }

    // 聯絡我們
    public function contact(Request $request)
    {
        $request->validate([
            $this->contactname() => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|integer',
            'message' => 'required|string',
            'g-recaptcha-response' => 'recaptcha',
            // OR since v4.0.0
            recaptchaFieldName() => recaptchaRuleName()
        ]);
        $contact = $request->all();
        $send = Contact::create($contact);

        Mail::to('suno.eeda@gmail.com')->send(new OrderShipped($send));
        return redirect('/');
    }
    public function contactname(){
        return 'name';
    }

    // 購物車
    public function add_cart(Request $request,$productID){
        $productId = $productID;
        $Product = Products::find($productId); // assuming you have a Product model with id, name, description & price
        $rowId = $productId; // generate a unique() row ID
        $userID = Auth::user()->id; // the user ID to bind the cart contents
        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => $request->qty,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return redirect('/cart_total');
    }

    public function cart_total(){
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent()->sort();
        return view('front/cart_total',compact('items'));
    }

    public function cart_update(Request $request, $cartID){
        $quantity = $request->quantity;
        $userID = Auth::user()->id;
        \Cart::session($userID)->update($cartID,array(
            'quantity' => $quantity,
        ));
        return 'success';
    }

    public function cart_delete(Request $request, $cartID){
        $userID = Auth::user()->id;
        \Cart::session($userID)->remove($cartID);

        return 'success';
    }

    public function cart_checkout(){
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent()->sort();
        return view('front/cart_checkout',compact('items'));
    }
    public function post_cart_checkout(Request $request)
    {
        // 接收請求資料, 宣告資料變數
        $userID = Auth::user()->id;
        $recipient_name = $request->recipient_name;
        $recipient_phone = $request->recipient_phone;
        $recipient_address = $request->recipient_address;
        $shipment_time = $request->shipment_time;
        $total_price = \Cart::session($userID)->getTotal();
        if($total_price > 30000){
            $shipment_price = 0;
        }else{
            $shipment_price = 120;
        }
        // 建立訂購者訂單
        $order = New Orders;
        $order->user_id = $userID;
        $order->recipient_name = $recipient_name;
        $order->recipient_phone = $recipient_phone;
        $order->recipient_address = $recipient_address;
        $order->shipment_time = $shipment_time;
        $order->total_price = $total_price;
        $order->shipment_price = $shipment_price;
        $order->save();

        // 建立訂單編號
        $order->order_no = 'hYd'.Carbon::now('+8:00')->format('YmdHis').$order->id;
        $order->save();

        // 建立商品詳細訂單->關聯訂購者訂單
        $cart_contents = \Cart::getContent()->sort();
        $items=[];

        foreach ($cart_contents as $item) {
            $OrderItem = new OrderDetails();
            $OrderItem->order_id = $order->id;
            $OrderItem->product_id = $item->id;
            $OrderItem->qty = $item->quantity;
            $OrderItem->price = $item->price;
            $OrderItem->save();

            $product = Products::find($item->id);
            $product_name = $product->title;
            $new_array = [
                'name' => $product_name,
                'qty' => $item->quantity,
                'price' => $item->price,
                'unit' => '個'
            ];

            array_push($items, $new_array);
        }
        if($shipment_price>0){
            $shipment_item=[
                'name' => '運費',
                'qty' => 1,
                'price' => 120,
                'unit' => '個'
            ];
            array_push($items,$shipment_item);
        }else{
            $shipment_item=[
                'name' => '運費',
                'qty' => 1,
                'price' => 0,
                'unit' => '個'
            ];
            array_push($items,$shipment_item);
        }

        //第三方支付
        $order_no = Carbon::now('+8:00')->format('YmdHis');

        $formData = [
            'UserId' => "", // 用戶ID , Optional
            'ItemDescription' => '產品簡介',
            'Items' => $items,
            'OrderId' => $order->order_no,
            // 'ItemName' => 'Product Name',
            // 'TotalAmount' => \Cart::getTotal(),
            'PaymentMethod' => 'ALL', // ALL, Credit, ATM, WebATM
        ];

        //清空購物車
        \Cart::clear();

        // return $this->checkout->setPostData($formData)->send();
        return $this->checkout->setNotifyUrl(route('notify'))->setReturnUrl(route('return'))->setPostData($formData)->send();
    }
    public function notifyUrl(Request $request)
    {
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            return '1|OK';
        } else {
            return '0|FAIL';
        }
    }
    public function returnUrl(Request $request)
    {
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            if (!empty($request->input('redirect'))) {
                return redirect($request->input('redirect'));
            } else {
                 //付款完成，下面接下來要將購物車訂單狀態改為已付款
                //目前是顯示所有資料將其DD出來
                // dd($this->checkoutResponse->collectResponse($serverPost));

                $order_no = $serverPost["MerchantTradeNo"];
                $order = orders::where('order_no',$order_no)->first();
                $order->payment_status = "已完成";
                $order->save();
                return redirect("/checkoutend/{$order_no}");
            }
        }
    }

}
