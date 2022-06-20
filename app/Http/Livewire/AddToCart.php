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
        Session::flash('cart_message',  $this->product->name . ' has been added to your cart successfully!');//

        $this->emit('productAdded');

        Session::put('cart',$cart);

        //dd($cart);

      //  return redirect()->back();

    }

    public function render()
    {
        return <<<'blade'
            <div class="d-inline">
             @if(session('cart_message'))


        <div class="alert alert-success opacity-1 alert-dismissible text-muted mt-3 col-lg-10 offset-lg-1  fs-reg" role="alert">
            <i class="bi bi-cart-check ps-3">

            </i>
            <span class="text-sm ps-4">{{session('cart_message')}} </span>
            <button type="button" class="btn-close text-lg py-3 opacity-8" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                <span aria-hidden="true"></span>
            </button>
        </div>

             @endif
              <button  wire:click="addToCart()" class="btn btn-outline-dark mt-auto text-center" ><i class="bi bi-cart-plus fs-4"></i></button>
            </div>
        blade;
    }
}
