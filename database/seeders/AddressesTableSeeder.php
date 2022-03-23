<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('addresses')->insert([
            'name_recipient'=> 'Herman Lisa ',
            'addressline_1'=> 'Oostnieuwkerksesteenweg 114',
            'addressline_2' => '8800 Roeselare',
            'user_id'=> 1,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('addresses')->insert([
            'name_recipient'=> 'Mirko vdb ',
            'addressline_1'=> 'StraatStraat 9999',
            'addressline_2' => '8800 Roeselare',
            'user_id'=> 2,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Address::factory()->count(50)->create();
    }
}
