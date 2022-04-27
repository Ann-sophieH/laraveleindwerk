<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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


   /* public function products(){
        $products = Product::with(['photos', 'colors'])->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $product = null;

        return view('products', compact('products', 'specs', 'categories', 'product'));
    }*/
    public function details(Product $product){
        //$product = Product::with(['photos', 'colors', 'productreviews.user'])->findOrFail($id);
        // $specss = Specification::whereNull('parent_id')->with( 'childspecs')->get();
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

        return view('checkout');
    }
   public function cartList(){

        return view('cart');
    }
    public function addToCart(Request $request){
        $product = Product::with(['specifications', 'colors', 'category', 'photos'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        return view('cart');
    }

    /**previous cart code w/o livewire**/
   /* public function addToCart($id){
        $product = Product::with(['specifications', 'colors', 'category', 'photos'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function cart(){
        if(!Session::has('cart')){
            return redirect('/products'); //geen sessie = back to shop
        }else{ //there is cart so get everything from session and put it in var $currentcart
            $currentCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($currentCart); //nieuw model cart vullen
            $cart = $cart->products; //
            return view('cart',compact('cart'));
        }
    }
    public function updateQuantity(Request $request){
        //dd($request);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQuantity($request->id, $request->quantity);
        Session::put('cart', $cart);
        return redirect()->back();
    }
    public function updateQuantityUp(Request $request){
        dd($request);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQuantityUp($request->id);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }
    */
}
