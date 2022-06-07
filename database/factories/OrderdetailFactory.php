<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orderdetail>
 */
class OrderdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $orders = Order::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        return [
            //
            'order_id' => $this->faker->randomElement($orders) ,
            'product_id' =>$this->faker->randomElement($products) ,
            'product_price' =>$this->faker->numberBetween(0, 4000) ,
            'amount' =>$this->faker->numberBetween(1,3) ,


        ];
    }
}
