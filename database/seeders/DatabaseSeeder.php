<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //RDM
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            UsersRolesTableSeeder::class,
            AddressesTableSeeder::class,
            //E-comm
            ProductsTableSeeder::class,
            CategoriesTableSeeder::class,
            SpecificationsTableSeeder::class,
            ProductsSpecificationsTableSeeder::class,
            ColorsTableSeeder::class,
            TypesTableSeeder::class,


        ]);
    }
}
