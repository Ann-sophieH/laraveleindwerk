<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartList extends Component
{

    public function quantDown($id,$quantity){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->down($id);
        Session::put('cart', $cart);
        $this->emit('productRemoved');

        if($quantity < 0 ){
            $cart-> removeItem($id);
        }
    }
    public function quantUp($id,$quantity){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->up($id, $cart->quantity);
        $this->emit('productAdded');

        Session::put('cart', $cart);
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        $this->emit('productRemoved');

        return redirect()->back();

    }

    public function render()
    {
            $currentCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($currentCart); //nieuw model cart vullen
     //   dd($cart->quantity);
            return view('livewire.cart-list', [
                'totalPrice'=> $cart->totalPrice,
                'totalQuantity'=> $cart->totalQuantity,
                $cart = $cart->products,

                'cart'=> $cart,
            ]);



    }
}
