<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use Illuminate\Http\Request;

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
        $products = Product::with(['photos', 'colors'])->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();

        return view('products', compact('products', 'specs', 'categories'));
    }
    public function speakers(){
        $products = Product::with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $types = Type::where('category_id' , 2)->get();

        return view('speakers', compact('products', 'specs', 'categories', 'types'));
    }
    public function speakersPerType($id){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 2)->get();
        $products = Type::findOrFail($id)->products()->with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);

        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();

        return view('speakers', compact('products', 'types', 'specs', 'categories'));

    }
    public function headphones(){
        $products = Product::with(['photos', 'colors'])->where('category_id' , 1)->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $types = Type::where('category_id' , 1)->get();
        return view('headphones', compact('products', 'specs', 'categories', 'types'));
    }
    public function headphonesPerType($id){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 1)->get();
        $products = Type::findOrFail($id)->products()->with(['photos', 'colors'])->where('category_id' , 1)->paginate(25);

        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        return view('headphones', compact('products', 'types', 'specs', 'categories'));

    }
    public function details($id){
        $product = Product::with(['photos', 'colors', 'productreviews.user'])->findOrFail($id);
        // $specss = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $specs = $product->specifications()->with( 'childspecs')->get();
        //dd($specs);
        return view('details', compact('product', 'specs'));
    }
    public function cart(){

        return view('cart');
    }
}
