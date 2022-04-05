<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'name' => $this->faker->name(),
            //'color' => $this->faker->colorName(),
            'price' => $this->faker->numberBetween(0, 4000),
            'details' => $this->faker->text(),

        ];
    }
}
