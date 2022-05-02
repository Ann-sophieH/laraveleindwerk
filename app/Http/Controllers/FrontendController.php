<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $currentCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($currentCart); //nieuw model cart vullen
        $cart = $cart->products;
        //nieuwe user wegschrijven if empty(Auth::user()) + address(es)
        //if (Auth::user()) == true; first or create for address

        return view('checkout', compact('cart'));
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

}
