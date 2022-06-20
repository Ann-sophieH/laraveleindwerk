<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $address = Address::where('address_type', 1)->pluck('id')->toArray();


        return [
            //
            'transaction_code' => 'testtransaction',
            'user_id' =>$this->faker->randomElement($users) ,
            'address_id' =>$this->faker->randomElement($address) ,




        ];
    }
}
