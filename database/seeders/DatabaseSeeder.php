<?php

namespace Database\Seeders;

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
        $this->call(BrandTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
