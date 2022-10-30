<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'vehicle_type_id' => 1,
            'name' => 'Service Mobil',
            'price' => 250000
        ]);

        Service::create([
            'vehicle_type_id' => 2,
            'name' => 'Service Motor',
            'price' => 50000
        ]);

        Service::create([
            'vehicle_type_id' => 3,
            'name' => 'Service Truk',
            'price' => 500000
        ]);

        Service::create([
            'vehicle_type_id' => 4,
            'name' => 'Service Pick Up',
            'price' => 300000
        ]);

        Service::create([
            'vehicle_type_id' => 5,
            'name' => 'Service Bajaj',
            'price' => 150000
        ]);
    }
}
