<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

   public $products = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public $extraProdsPrice = 0;


    public function __construct($oldCart){
        if($oldCart){
            $this->products = $oldCart->products;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
            $this->extraProdsPrice = $oldCart->extraProdsPrice;

        }
    }
    public function add($product, $product_id){
        $shopItems = [
            'quantity'=>0,
            'product_id'=>0,
            'product_name'=>$product->name,
            'product_price'=>$product->price,
            'product_image'=> ($product->photos) ? $product->photos->first()->file : 'http://via.placeholder.com/400x400',//addifstatement
            'product_details'=>$product->details,
            'product_slug'=>$product->slug,
            'product_category_id'=>$product->category_id,

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
        $shopItems['product_slug']=$product->slug;
        $shopItems['product_category_id']=$product->category_id;

        $this->totalQuantity++;
        $this->totalPrice += $product->price;
        $this->extraProdsPrice += $product->price;
        $this->products[$product_id] = $shopItems;
    }

    public function up($id, $quantity){


        $this->products[$id]['quantity'] +=1; //1 product less
        $this->totalQuantity += 1; //1 off total
        $this->totalPrice += $this->products[$id]['product_price'];
        $this->extraProdsPrice = $this->products[$id]['product_price']*$this->products[$id]['quantity'];
    }
    public function down($id){

        if(($this->products[$id]['quantity']) > 0){
            $this->products[$id]['quantity'] -=1; //1 product less
            $this->totalQuantity -= 1; //1 off total
            $this->totalPrice -= $this->products[$id]['product_price'];//totalprice - itemprice
            $this->extraProdsPrice = $this->products[$id]['product_price']*$this->products[$id]['quantity'];

        }//need else? also remove maybe



    }

    public function removeItem($id){
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= ($this->products[$id]['quantity']*$this->products[$id]['product_price']);
        unset($this->products[$id]);
    }

}
