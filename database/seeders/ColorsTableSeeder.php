<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('colors')->insert(['name' => 'purple heart', 'hex_value'=>'#76088C']);
        DB::table('colors')->insert(['name' => 'khaki', 'hex_value'=>'#4A6237']);
        DB::table('colors')->insert(['name' => 'midnight blue', 'hex_value'=>'#233A71']);
        Color::factory(12)->create();

        $colors = Color::all();
        Product::all()->each(function ($product) use ($colors){
            $product->colors()->attach(
                    $colors->random(rand(1,3))->pluck('id')->toArray()
                );

        });
    }
}
