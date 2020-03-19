<?php
namespace App\Http\Controllers;
use App\News;
use App\Contact;
use App\Products;
use App\Mail\SendToUser;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    // 首頁
    public function index()
    {
        return view('front/index');
    }
        // 最新消息頁面
    public function news()
    {
        $news = News::all()->sortByDesc('sort');
        return view('front/news', compact('news'));
    }
    public function news_content($id)
    {
        $news = News::with('news_img')->find($id);

        return view('front/news_content', compact('news'));
    }
    // 商品頁面
    public function product()
    {
        $products = Products::all()->sortByDesc('sort');
        return view('front/product',compact('products'));
    }
    public function Product_content($productID){

        $product = Products::find($productID);

        return view('front/product_content', compact('product'));
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
}
