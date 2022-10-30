<?php

namespace Database\Seeders;

use App\Models\Mechanic;
use Illuminate\Database\Seeder;

class MechanicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mechanic::create([
            'name' => 'Mamat',
            'phone_number' => '089077654257',
            'address' => 'Jalan Dadap',
            'salary' => 0
        ]);

        Mechanic::create([
            'name' => 'Dapit',
            'phone_number' => '089077651234',
            'address' => 'Jalan Dadap Prances',
            'salary' => 0
        ]);

        Mechanic::create([
            'name' => 'Achong',
            'phone_number' => '089077651029',
            'address' => 'Jalan Anjay',
            'salary' => 0
        ]);

        Mechanic::create([
            'name' => 'Apen',
            'phone_number' => '089077659820',
            'address' => 'Jalan Sereal',
            'salary' => 0
        ]);

        Mechanic::create([
            'name' => 'Tom Huang',
            'phone_number' => '089077654567',
            'address' => 'Jalan Aceer II',
            'salary' => 0
        ]);
    }
}
