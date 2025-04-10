<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleType::create([
            'name' => 'Mobil'
        ]);

        VehicleType::create([
            'name' => 'Motor'
        ]);

        VehicleType::create([
            'name' => 'Truk'
        ]);

        VehicleType::create([
            'name' => 'Pick Up'
        ]);

        VehicleType::create([
            'name' => 'Bajaj'
        ]);
    }
}
