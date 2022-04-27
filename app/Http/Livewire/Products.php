<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $search;

    protected $updatesQueryString = ['search'];


    public function addToCart($id){
        $product = Product::with(['specifications', 'colors', 'category', 'photos'])->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart',$cart);
        return view('cart');
    }
    public function mount(): void
    {
        $this->search = request()->query('search', $this->search);
    }
    public function render()
    {
        return view('livewire.products', [
            'products'=>Product::with(['photos', 'colors'])->paginate(25),
            'specs'=> Specification::whereNull('parent_id')->with( 'childspecs')->get(),
            'categories'=>Category::all(),
            'product'=>null,

        ])
            ->extends('layouts.index')
            ->pagination(25);
    }
}
