<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['add'];

    public function mount($oldCart): void
    {
        if($oldCart){
            $this->products = $oldCart->products;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($product, $product_id){

    }
    public function render()
    {
        return view('livewire.cart');
    }
}
