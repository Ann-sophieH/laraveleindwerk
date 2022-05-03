<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersUserRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;

class FrontendController extends Controller
{
    //

    public function index(){
        $carr_products = Product::where('category_id', 1)->take(6)->get();

        return view('index', compact('carr_products'));
    }
    public function blog(){

        return view('blog');
    }
    public function products(){

        return view('products');
    }
    public function details(Product $product){
        $specs = $product->specifications()->with( 'childspecs')->get();

        return view('details', compact('product', 'specs'));
    }
    public function speakers(){
        $products = Product::with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $types = Type::where('category_id' , 2)->get();
        $product = null;
        return view('speakers', compact('products', 'specs', 'categories', 'types', 'product'));
    }
    public function speakersPerType(Type $type){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 2)->get();
        $products = Type::findOrFail($type->id)->products()->with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);
        $product = null;
        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();

        return view('speakers', compact('products', 'types', 'specs', 'categories', 'product'));

    }
    public function headphones(){
        $products = Product::with(['photos', 'colors'])->where('category_id' , 1)->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $types = Type::where('category_id' , 1)->get();
        $product = null;
        return view('headphones', compact('products', 'specs', 'categories', 'types', 'product'));
    }
    public function headphonesPerType(Type $type){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 1)->get();
        $products = Type::findOrFail($type->id)->products()->with(['photos', 'colors'])->where('category_id' , 1)->paginate(25);
        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $product = null;
        return view('headphones', compact('products', 'types', 'specs', 'categories', 'product'));

    }
    public function checkout(){
        /** get cart **/
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart); //nieuw model cart vullen
        $cart = $cart->products;

        /** get user + addresses + delivery date (either get from pagerequest or from Auth) **/
        if (Auth::user()){
            $user = Auth::user();
            $delivery_address = Auth::user()->addresses->where('address_type' , 1 )->first();
            $facturation_address = Auth::user()->addresses->where('address_type' , 2 )->first();
        }else{
            $user = null;
            $delivery_address = null;
            $facturation_address   = null;
        }
        $delivery_date = Carbon::now()->addWeekdays(5)->format('l, d F, Y');


        return view('checkout', compact('cart', 'user', 'delivery_address', 'facturation_address' , 'delivery_date'));
    }

    public function order(Request $request)
    {
        /** getting cart to make orderdetails and get amount **/
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart); //nieuw model cart vullen
        /** formatting integer to string for mollie  **/
        $amount = number_format( $cart->totalPrice, 2, '.', '' );
        /** create new mollie payment through API  **/
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => $amount, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment to BV Bing & Olufson ',
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
            "metadata" => [
                "order_id" => "12345"
            ],
        ]);
       // dd($payment);
        if ($payment->id != null ) {
            if (Auth::user()) {
                $user = Auth::user();
                /** new order  **/
                $order = new Order();
                $order->user_id = $user->id;
                $order->transaction_code = $payment->id ;
                $order->save();
                /** add orderdetails for existing user  **/
                $cart = $cart->products;
                foreach ($cart as $item) {
                    $orderdetail = new Orderdetail();
                    //dd($item);
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $item['product_id'];
                    $orderdetail->product_price = $item['product_price'];
                    $orderdetail->amount = $item['quantity'];
                    $orderdetail->save();
                }
                Session::flush('cart');
                /** add facturation address for existing user  **/
                if ($request['fname_recipient'] && $request['faddressline_1'] && $request['faddressline_2']) {
                    $address = new Address();
                    $address->name_recipient = $request['fname_recipient'];
                    $address->addressline_1 = $request['faddressline_1'];
                    $address->addressline_2 = $request['faddressline_2'];
                    $address->address_type = 2;
                    $address->save();
                    $user->addresses()->sync($address->id, false);
                }
            } else {
                /** create new user from form **/
                $request->validate([
                    'username' => 'string|max:255',
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'telephone' => 'max:15',//not unique cause huistelefoon
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
                    'name_recipient' => 'required|string|max:255',
                    'addressline_1' => 'required|string|max:255',
                    'addressline_2' => 'required|string|max:255',
                ]);
                $user = new User();
                $user->username = $request->username;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->telephone = $request->telephone;
                $user->password = Hash::make($request['password']);
                $user->is_active = 1;
                $user->save();
                /** save delivery address **/
                $address = new Address();
                $address->name_recipient = $request['name_recipient'];
                $address->addressline_1 = $request['addressline_1'];
                $address->addressline_2 = $request['addressline_2'];
                // $address->address_type = 1; default value
                $address->save();
                $user->addresses()->sync($address->id, false);
                /** save facturation address **/
                if ($request['fname_recipient'] && $request['faddressline_1'] && $request['faddressline_2']) {
                    $address = new Address();
                    $address->name_recipient = $request['fname_recipient'];
                    $address->addressline_1 = $request['faddressline_1'];
                    $address->addressline_2 = $request['faddressline_2'];
                    $address->address_type = 2;
                    $address->save();
                    $user->addresses()->sync($address->id, false);
                }
                /**save order of new user **/
                /** new order  **/
                $order = new Order();
                $order->user_id = $user->id;
                $order->transaction_code = $payment->id ;
                $order->save();
                /** save orderdetails for order  **/
                $cart = $cart->products;
                foreach ($cart as $item) {
                    $orderdetail = new Orderdetail();
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $item['product_id'];
                    $orderdetail->product_price = $item['product_price'];
                    $orderdetail->amount = $item['quantity'];
                    $orderdetail->save();
                }
                Session::flush('cart');
            }

            /** empty cart **/

        }
        return redirect($payment->getCheckoutUrl(), 303);//to payment

    }
    public function paymentSuccess() {
        //echo 'payment has been received';
        //$payment = Mollie::api()->payments()->get($payment->id);
        //dd( Mollie::api()->payments());
        Session::flash('payment_message', 'Your order has been placed successfully, we will start packing soon!');//put message in cart!!

        return redirect('cart');
    }
   public function cart(){

        return view('cart');
    }


}
