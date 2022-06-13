<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Headphones',
            'photo_id'=> 8,


        ]);
        DB::table('categories')->insert([
            'name' => 'Speakers',
            'photo_id'=> 7,


        ]);
    }
}
