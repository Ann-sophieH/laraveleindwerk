<?php

namespace Database\Seeders;

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

    }
}
