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
        //$specs
        $specs = Specification::whereNotNull('parent_id')->get();
        $parentSpecs = Specification::whereNull('parent_id')->get();
        Product::all()->each(function ($product) use ($parentSpecs){
            $product->specifications()->attach(
                $parentSpecs->pluck('id')->toArray()
            );
        });

        Product::all()->each(function ($product) use ($specs){
           $product->specifications()->attach(
               $specs->random(3)->pluck('id')->toArray()
           );
        });
    }
}
