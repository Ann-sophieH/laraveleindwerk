<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();

        return [
            //
            'name_recipient' => $this->faker->name(),
            'addressline_1' =>$this->faker->address() ,
            'addressline_2' => $this->faker->streetAddress(),
            'user_id'=> $this->faker->randomElement($users),


        ];
    }
}
