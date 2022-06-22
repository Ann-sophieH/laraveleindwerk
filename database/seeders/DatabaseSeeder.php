<?php

namespace Database\Seeders;

use App\Models\Addresstype;
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
            RolesUsersTableSeeder::class,
            AddressesTableSeeder::class,
            AddresstypesTableSeeder::class,
            //E-comm
            ProductsTableSeeder::class,
            CategoriesTableSeeder::class,
            SpecificationsTableSeeder::class,
            ProductsSpecificationsTableSeeder::class,
            ColorsTableSeeder::class,
            TypesTableSeeder::class,
            OrdersTableSeeder::class,
            OrderdetailsTableSeeder::class,
            PhotosTableSeeder::class,
            PostsTableSeeder::class,




        ]);
    }
}
