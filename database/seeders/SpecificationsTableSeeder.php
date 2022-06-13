<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        DB::table('specifications')
            ->insert([
                'name'=>'wifi type',
                'parent_id'=>NULL,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('specifications')
            ->insert([
                'name'=>'bluetooth',
                'parent_id'=>NULL,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('specifications')
            ->insert([
                'name'=>'charging',
                'parent_id'=>NULL,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('specifications')
            ->insert([
                'name'=>'size',
                'parent_id'=>NULL,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('specifications')
            ->insert([
                'name'=>'Noise cancelling',
                'parent_id'=>NULL,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('specifications')
            ->insert([
                'name'=>'Pairing options',
                'parent_id'=>NULL,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);

        DB::table('specifications')
            ->insert([
                'name'=>'wifi 7',
                'parent_id'=>1,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'wifi 8',
                'parent_id'=>1,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'bluetooth pairing',
                'parent_id'=>2,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'bluetooth 4',
                'parent_id'=>2,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'bluetooth 3',
                'parent_id'=>2,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'cable connector',
                'parent_id'=>3,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'wireless charging',
                'parent_id'=>3,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'charges all products',
                'parent_id'=>3,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'USB C',
                'parent_id'=>3,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'small',
                'parent_id'=>4,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'medium',
                'parent_id'=>4,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'large',
                'parent_id'=>4,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'Ambient sound',
                'parent_id'=>5,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'High quality noise block',
                'parent_id'=>5,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'Travel proof',
                'parent_id'=>5,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'bluetooth 4',
                'parent_id'=>6,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'wifi connecting',
                'parent_id'=>6,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'multipairing up to 6',
                'parent_id'=>6,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        DB::table('specifications')
            ->insert([
                'name'=>'compatible over brands',
                'parent_id'=>6,
                'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $specifications = Specification::all();
        Category::all()->each(function ($category) use ($specifications){
            $category->specifications()->attach(
                $specifications->random(rand(1,6))->pluck('id')->toArray()
                );
        });

       // Specification::factory()->count(50)->create();


    }
}
