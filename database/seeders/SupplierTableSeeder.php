<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name' => 'Evan',
            'company_name' => 'PT Honda',
            'phone_number' => '089077654257',
            'address' => 'Jalan Dadap',
        ]);

        Supplier::create([
            'name' => 'Alex',
            'company_name' => 'PT Shell Indonesia',
            'phone_number' => '086723152987',
            'address' => 'Jalan Dadap II',
        ]);

        Supplier::create([
            'name' => 'Siri',
            'company_name' => 'PT Yamaha Jaya',
            'phone_number' => '089018290029',
            'address' => 'Jalan Dadap Prancis',
        ]);

        Supplier::create([
            'name' => 'Anya Forger',
            'company_name' => 'PT Kawasaki Indonesia',
            'phone_number' => '087899221122',
            'address' => 'Jalan Jepang II No.20',
        ]);

        Supplier::create([
            'name' => 'Evan',
            'company_name' => 'PT Suzuki Indonesia',
            'phone_number' => '088812345678',
            'address' => 'Jalan Jembatan Lima',
        ]);
    }
}
