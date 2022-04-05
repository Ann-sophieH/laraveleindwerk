<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('specifications')->insert(['name' => 'wifi']);
        DB::table('specifications')->insert(['name' => 'bluetooth']);
        DB::table('specifications')->insert(['name' => 'Wireless charging']);
        DB::table('specifications')->insert(['name' => 'Wearable']);
        DB::table('specifications')->insert(['name' => 'Noice cancelling']);
        DB::table('specifications')->insert(['name' => 'Multipairing']);

        $specifications = Specification::all();
        Category::all()->each(function ($category) use ($specifications){
            $category->specifications()->attach(
                $specifications->random(rand(1,6))->pluck('id')->toArray()
                );
        });


    }
}
