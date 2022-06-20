<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'is_active'=>1,
            //'role_id'=>1, niet want komt in tussentabel
            'username'=> 'Anso  ',
            'first_name'=> 'annsophie',
            'last_name' => 'herman',
            'email'=>'hermanann-sophie@hotmail.com',
            'telephone'=>'0470518121',

            'email_verified_at'=> \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
            'photo_id'=>1,
            'password'=>bcrypt(12345678),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'is_active'=>1,
            'username'=> 'tom',
            'first_name'=> 'tom',
            'last_name' => 'vanhoutte',
            'email'=>'vanhoutte.tim@gmail.com',
            'telephone'=>'12345678',
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'photo_id'=>1,
            'password'=>bcrypt(12345678),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'is_active'=>1,
            'username'=> 'tim',
            'first_name'=> 'tim',
            'last_name' => 'vanhoutte',
            'email'=>'vanhoutte@gmail.com',
            'telephone'=>'12345678',
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'photo_id'=>3,
            'password'=>bcrypt(12345678),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        User::factory()->count(50)->create();



    }
}
