<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddToCart extends Component
{
    public $product;

    public function addToCart(){
        $product = Product::with(['specifications', 'colors', 'category', 'photos'])->where('id', $this->product->id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->addItem( $this->product, $product->id);
        Session::put('cart',$cart);
        //dd($cart);
        return redirect()->back();

    }

    public function render()
    {
        return <<<'blade'
            <div>
              <button  wire:click="addToCart()" class="btn btn-outline-dark mt-auto text-center" ><i class="bi bi-cart-plus fs-4"></i></button>
            </div>
        blade;
    }
}
