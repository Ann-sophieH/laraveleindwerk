<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Specification;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Beosound level',
            //'color' => 'Purple heart',
            'price' => 1899,
            //'photo_id'=>1,
            'category_id'=>2,
            'details' => 'lorem ipsum',
            'slug'=> 'beosound-level',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Product::factory()->count(50)->create();


    }
}
