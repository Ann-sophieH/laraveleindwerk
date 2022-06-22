<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        $title = $this->faker->sentence($nbwords= 6, $variableNbWords=true);
        $slug = Str::slug($title, '-');
        return [
            //
            'user_id'=> $this->faker->randomElement($users),
            'category_id'=>$this->faker->numberBetween($min= 1, $max= 2),
            //'photo_id'=>$this->faker->numberBetween($min= 1, $max= 2),
            'title'=>$title,
            'slug'=>$slug,
            'sticky'=> 0,
            'body_short'=>$this->faker->realText($maxNbChars=100, $indexSize=2),
            'body_long'=>$this->faker->realText($maxNbChars=250, $indexSize=2),
            'blockquote'=>$this->faker->realText($maxNbChars=20, $indexSize=2),
            'active'=> $this->faker->numberBetween($min= 0, $max= 1),
        ];
    }

}
