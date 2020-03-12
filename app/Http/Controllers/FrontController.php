<?php
namespace App\Http\Controllers;
use App\News;
use App\Contact;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        return view('front/index');
    }
    public function product()
    {
        $products = Products::all()->sortByDesc('sort');
        return view('front/product',compact('products'));
    }
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
        Contact::create($contact);
        return redirect('/');
    }
    public function contactname(){
        return 'name';
    }
    public function Product_content(){


        return view('front/Product_content');
    }

    public function add_cart(){
        $productId = 1;
        $Product = Products::find($productId); // assuming you have a Product model with id, name, description & price
        $rowId = 456; // generate a unique() row ID
        $userID = Auth::user()->id; // the user ID to bind the cart contents
        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return redirect('/cart_total');
    }
    public function cart_total(){
        $userID = Auth::user()->id;
        $items = \Cart::session($userID)->getContent();
        dd($items);
    }
}
