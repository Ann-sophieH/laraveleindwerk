<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            'name' => 'over-ear',
            'category_id'=> 1,
            'photo_id'=> 1,
            'slug'=>'over-ear',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('types')->insert([
            'name' => 'earphones',
            'category_id'=> 1,
            'photo_id'=> 3,
            'slug'=>'earphones',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('types')->insert([
            'name' => 'noise-cancelling',
            'category_id'=> 1,
            'photo_id'=> 2,
            'slug'=>'noise-cancelling',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('types')->insert([
            'name' => 'portable',
            'category_id'=> 2,
            'photo_id'=> 4,
            'slug'=>'portable',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('types')->insert([
            'name' => 'home audio',
            'category_id'=> 2,
            'photo_id'=> 5,
            'slug'=>'home-audio',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('types')->insert([
            'name' => 'speaker sets',
            'category_id'=> 2,
            'photo_id'=> 6,
            'slug'=>'speaker-sets',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);


        $types_hp = Type::where('category_id', 1)->get();
        //if category_id = 1 it's products that are headphones so only types related to headphones get attached
        Product::where('category_id', 1)->each(function ($product) use ($types_hp){
            $product->types()->attach(
                $types_hp->random( 1)->pluck('id')->toArray()
            );
        });

        $types_speaker = Type::where('category_id', 2)->get();
        Product::where('category_id',2)->each(function ($product) use ($types_speaker){
            $product->types()->attach(
                $types_speaker->random( 1)->pluck('id')->toArray()
            );
        });



    }
}
