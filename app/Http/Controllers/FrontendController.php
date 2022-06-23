<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersUserRequest;
use App\Mail\Contact;
use App\Mail\Newslettermail;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Coupon;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Post;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mollie\Laravel\Facades\Mollie;

class FrontendController extends Controller
{
    //

    public function index(){
        $carr_products = Product::where('category_id', 1)->with('photos')->take(6)->get();
        return view('index', compact('carr_products'));
    }
    public function blog(){
        $posts = Post::with(['photos', 'category', 'user'])->filter(request(['search']))->paginate(10); //
        $sticky_post = Post::with(['photos', 'category', 'user'])->where('sticky', 1)->get()->last();
     // dd($sticky_post);
        return view('blog', compact('posts', 'sticky_post'));
    }
    public function blogpost(Post $post){
        // $post =Post::findOrFail($id);
        $post->load(['postcomments.user']);
        $comments = Comment::with([ 'user','post','childcomments',  ])->whereNull('parent_id')->where('post_id',$post->id )->paginate(10);

     //   $replies = Comment::with([ 'user','post','childcomments' ])->where('parent_id', $id)->paginate(10);

        return view('blogpost', compact('post', 'comments'));
    }
/*    public function products(){

        return view('products');
    }*/
    public function faq(){

        return view('faq');
    }
    public function newsletter(Request $request){
        $subscriber = new Newsletter();
        $request->validate([
            'email' => 'required|email|unique:newsletters',

        ],
            $messages = [
                'email.required' => 'Give us a correct email for exciting offers!',

            ]
        );
        $subscriber->email = $request->email;
        $subscriber->save();
        $data = $request->email;
        Mail::to(request('email'))->send(new Newslettermail($data));

        Session::flash('newsletter_message', 'You are subscribed to our newsletter now, ENJOY 20% OFF WITH CODE 12345678! Use it at checkout ');//put message in cart!!

        return redirect()->back();
    }
    public function details(Product $product){
        $product->load(['reviews.user']);
       // $specs = $product->specifications()->with( 'childspecs')->get();
        $specs = $product->specifications()->whereNull('parent_id')->with( 'childspecs')->get();
        $product->with('reviews.user', 'reviews','reviews.user.photos');

        return view('details', compact('product', 'specs'));
    }
    public function cart(){

        return view('cart');
    }
    public function orderReceived(){

        return view('order_received');
    }
    public function checkout(){
        /** get cart **/
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart); //nieuw model cart vullen
        $cart = $cart->products;

        /** get user + addresses + delivery date  **/

            $user = Auth::user();
            $delivery_addresses = Auth::user()->addresses->where('address_type' , 1 )->take(5);
            $facturation_addresses = Auth::user()->addresses->where('address_type' , 2 )->take(5);

        $delivery_date = Carbon::now()->addWeekdays(5)->format('l, d F, Y');


        return view('checkout', compact('cart', 'user', 'delivery_addresses', 'facturation_addresses' , 'delivery_date'));
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
           /* "metadata" => [
                "order_id" => "12345"
            ],*/
        ]);
        if ($payment->id != null ) { //$payment->id == transaction code
                $user = Auth::user();
            /** add NEW delivery address **/
            if ($request['name_recipient'] && $request['addressline_1'] && $request['addressline_2']) {
                $request->validate([
                    'name_recipient' => 'required|string',
                    'addressline_1' => 'required|string',
                    'addressline_2' => 'required|string',
                ], $messages = [
                        'name_recipient.required' => 'We need to know which person to send your package to!',
                        'addressline_1.required' => 'We need to know which address to send your package to!',
                        'addressline_2.required' => 'We need to know which address to send your package to!',

                    ]
                );
                $address = new Address();
                $address->name_recipient = $request['name_recipient'];
                $address->addressline_1 = $request['addressline_1'];
                $address->addressline_2 = $request['addressline_2'];
                $address->address_type = 1;
                $address->save();
                $user->addresses()->sync($address->id, false);
            }
                /** new order  **/
                $order = new Order();
                //if they add a new address it will be shipped there
            if($request['name_recipient'] && $request['addressline_1'] && $request['addressline_2']){
             //   dd($user->addresses()->where('address_type', 1)->latest()->first()->id);
                $address_id = $user->addresses()->where('address_type', 1)->latest()->first()->id;
                $order->address_id = $address_id;
            }else{                //if they select an exisiting address it will be shipped there
                $request->validate([
                    'delivery_address_id' => 'required|',
                ], $messages = [
                        'delivery_address_id.required' => 'We need to know which address to send your package to!',
                    ]
                );
                $order->address_id = $request->delivery_address_id;

            }
                $order->user_id = $user->id;
                $order->transaction_code = $payment->id ;
                if(Session::has('coupon')){
                    $coupon =  Session::get('coupon');
                    $order->coupon_id = $coupon->id;
                }
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
                Session::forget('cart'); // empties only the cart var not entire session
                Session::forget( 'coupon');
            /** add NEW facturation address **/
                if ($request['fname_recipient'] && $request['faddressline_1'] && $request['faddressline_2']) {
                    $request->validate([
                        'fname_recipient' => 'required|string',
                        'faddressline_1' => 'required|string',
                        'faddressline_2' => 'required|string',

                    ], $messages = [
                        'fname_recipient.required' => 'We need to know which person to send your package to!',
                        'faddressline_1.required' => 'We need to know which address to send your package to!',
                        'faddressline_2.required' => 'We need to know which address to send your package to!',

                    ]);
                   // $address = new Address();
                    $address->name_recipient = $request['fname_recipient'];
                    $address->addressline_1 = $request['faddressline_1'];
                    $address->addressline_2 = $request['faddressline_2'];
                    $address->address_type = 2;
                    $address->save();
                    $user->addresses()->sync($address->id, false);
                }

          /**   in case we add 'continue as guest' in later fase -> if != auth  create account from form **/
                /** create new user from form **/
               /* $request->validate([
                    'username' => 'string|max:255',
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'telephone' => 'max:15',//not unique cause homephone
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
                auth()->login($user);*/
                /** save delivery address **/
               /* $address = new Address();
                $address->name_recipient = $request['name_recipient'];
                $address->addressline_1 = $request['addressline_1'];
                $address->addressline_2 = $request['addressline_2'];
                // $address->address_type = 1; default value
                $address->save();
                $user->addresses()->sync($address->id, false);*/
                /** save facturation address **/
               /* if ($request['fname_recipient'] && $request['faddressline_1'] && $request['faddressline_2']) {
                    $address = new Address();
                    $address->name_recipient = $request['fname_recipient'];
                    $address->addressline_1 = $request['faddressline_1'];
                    $address->addressline_2 = $request['faddressline_2'];
                    $address->address_type = 2;
                    $address->save();
                    $user->addresses()->sync($address->id, false);
                }*/
                /**save order of new user **/
                /** new order  **/
                /*$order = new Order();
                $order->user_id = $user->id;
                $order->transaction_code = $payment->id ;
                $order->save();*/
                /** save orderdetails for order  **/
               /* $cart = $cart->products;
                foreach ($cart as $item) {
                    $orderdetail = new Orderdetail();
                    $orderdetail->order_id = $order->id;
                    $orderdetail->product_id = $item['product_id'];
                    $orderdetail->product_price = $item['product_price'];
                    $orderdetail->amount = $item['quantity'];
                    $orderdetail->save();
                }*/
                /** empty cart **/
/*                Session::forget('cart');//flushes all sessions why not only cart*/

        }

        return redirect($payment->getCheckoutUrl(), 303);//to payment
    }
    public function paymentSuccess() {
        //echo 'payment has been received';
        //$payment = Mollie::api()->payments()->get($payment->id);
        //dd( Mollie::api()->payments());
        //Session::flash('payment_message', 'Your order has been placed successfully, we will start packing soon!');

        return redirect('/received');
    }


}
