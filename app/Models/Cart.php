<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

  /*  public $products = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->products = $oldCart->products;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($product, $product_id){
        $shopItems = [
            'quantity'=>0,
            'product_id'=>0,
            'product_name'=>$product->name,
            'product_price' =>$product->price,
            'product_colors' =>$product->colors,
            'product_image'=>$product->photos->first()->file, // add if statement
            'product_details'=>$product->details,
            'product'=>$product
        ];
        if($this->products){
            if(array_key_exists($product_id, $this->products)){
                $shopItems = $this->products[$product_id];
            }
        }
        $shopItems['quantity']++;
        $shopItems['product_id'] = $product_id;
        $shopItems['product_name'] = $product->name;
        $shopItems['product_price'] = $product->price;
        $shopItems['product_colors'] = $product->colors;
        $shopItems['product_image'] = $product->photos->first()->file;
        $shopItems['product_details'] = $product->details;
        $this->totalQuantity++;
        $this->totalPrice += $product->price;
        $this->products[$product_id] = $shopItems;
    }
    public function updateQuantity($id, $quantity){
        //telt het totaal aantal items in de winkelwagen
        $this->totalQuantity -= $this->products[$id]['quantity']; //oude quantity aftrekken van totaal
        $this->totalQuantity += $quantity; //nieuwe quant bij totaal gaan tellen

        if($this->products[$id]['quantity'] < $quantity){ //als quant verhoogd wordt
            $this->totalPrice -= ($this->products[$id]['quantity']*$this->products[$id]['product_price']);//price op null
            $this->totalPrice += $quantity*$this->products[$id]['product_price'];//price * nieuwe hoeveelheid
        }else{ // als quant verlaagd wordt OM NEGATIEVE WAARDEN TE VERMIJDEN !!!!
            $this->totalPrice -= ($this->products[$id]['quantity']-$quantity)*$this->products[$id]['product_price'];
        }
        $this->products[$id]['quantity'] = $quantity;
    }
    public function updateQuantityUp($id){
     //   $this->totalQuantity -= $this->products[$id]['quantity']; //oude quantity aftrekken van totaal

            dd($id);
        $this->totalQuantity += $this->products[$id]['quantity'];
        $this->totalPrice += ($this->products[$id]['quantity']*$this->products[$id]['product_price']);

        $this->products[$id]['quantity'] += 1;

           // $this->totalPrice -= ($this->products[$id]['quantity']*$this->products[$id]['product_price']);//price op null

    }
    public function removeItem($id){
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= ($this->products[$id]['quantity']*$this->products[$id]['product_price']);
        unset($this->products[$id]);
    }*/

}
