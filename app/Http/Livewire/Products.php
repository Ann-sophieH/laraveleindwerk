<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';



    public function addToCart( $id){
        $product = Product::with(['specifications', 'colors', 'category', 'photos'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        //return redirect()->back();

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
    public function speakersPerType(Type $type){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 2)->get();
        $products = Type::findOrFail($type->id)->products()->with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);
        $product = null;
        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();

        return view('speakers', compact('products', 'types', 'specs', 'categories', 'product'));

    }

    public function mount(): void
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        if( Session::has('cart')){
            return view('livewire.products', [
                'products'=>Product::with(['photos', 'colors'])->paginate(10),
            'specs'=> Specification::whereNull('parent_id')->with( 'childspecs')->get(),
            'product'=>null,
            'types'=> Type::where('category_id' , 1)->get(),
        ])->extends('layouts.index');


        }else{
            return view('livewire.products', [
                'products'=>Product::with(['photos', 'colors'])->paginate(10),
            'specs'=> Specification::whereNull('parent_id')->with( 'childspecs')->get(),
           // 'categories'=>Category::all(),
            'product'=>null,
            'types'=> Type::where('category_id' , 2)->get(),
        ])->extends('layouts.index');

        }



    }
}
