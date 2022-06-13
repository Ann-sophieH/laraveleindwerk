<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Counter extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];
    public function mount(): void
    {

        $cart = Session::has('cart') ? Session::get('cart'):null;
        if($cart){ //to solve reading property on null
            $this->cartTotal = $cart->totalQuantity;
        }

    }

    public function updateCartTotal(): void
    {
        $cart = Session::has('cart') ? Session::get('cart'):null;
        $this->cartTotal = $cart->totalQuantity;
    }

    public function render()
    {
        return <<<'blade'
            <div>
               <a class="nav-link" href="{{asset('cart')}}"><i class="bi bi-bag fa-lg text-muted" style="font-size: 1.5rem;"><asp:Label ID="lblCartCount" runat="server" CssClass="badge badge-warning text-muted "  ForeColor="White"/>{{ $cartTotal }}</i></a>
            </div>
        blade;
    }
}
