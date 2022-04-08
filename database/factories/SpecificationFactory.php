<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specification>
 */
class SpecificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $specs = [
            'waterproof',
            'wifi 8',
            'bluetooth pairing ',
            'cable connector ',
            'portable',
            'wireless',
            'multipairing',
            'singlepairing',
            'loveless',
            'no screaming',
        ];
        return [
            //
            'name'=>$this->faker->randomElement($specs),
            'parent_id'=>$this->faker->numberBetween(1, 6)
        ];
    }
}
