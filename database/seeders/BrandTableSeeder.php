<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Honda'
        ]);

        Brand::create([
            'name' => 'Yamaha'
        ]);

        Brand::create([
            'name' => 'Shell'
        ]);

        Brand::create([
            'name' => 'Suzuki'
        ]);

        Brand::create([
            'name' => 'Kawasaki'
        ]);

        Brand::create([
            'name' => 'Bridgestone'
        ]);
    }
}
