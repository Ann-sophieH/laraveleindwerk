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
            'name' => 'Beosound ' . $this->faker->word(),
            //'color' => $this->faker->colorName(),
            'price' => $this->faker->numberBetween(0, 4000),
            'details' => $this->faker->sentence($nbwords= 8, $variableNbWords=true),
            'category_id'=>$this->faker->numberBetween(1, 2),
        ];
    }
}
