<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSpecificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $specs = Specification::all();
        Product::all()->each(function ($product) use ($specs){
           $product->specifications()->attach(
               $specs->random(rand(1, 6))->pluck('id')->toArray()
           );
        });
    }
}
