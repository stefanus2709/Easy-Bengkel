<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Kampas Ganda Nmax Original 2DP PNP Vario PCX ADV',
            'category_id' => 4,
            'vehicle_type_id' => 2,
            'brand_id' => 1,
            'supplier_id' => 1,
            'quantity' => 5,
            'price' => 155000,
            'selling_price' => 200000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'REM BELAKANG / DISCPAD /BRAKE PAD NMAX, N-MAX ASLI YAMAHA',
            'category_id' => 4,
            'vehicle_type_id' => 2,
            'brand_id' => 2,
            'supplier_id' => 3,
            'quantity' => 15,
            'price' => 56000,
            'selling_price' => 100000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'Kampas Rem belakang + Dispad Cakram Vario 110 125 150 CBS FI New KVB',
            'category_id' => 4,
            'vehicle_type_id' => 2,
            'brand_id' => 1,
            'supplier_id' => 1,
            'quantity' => 15,
            'price' => 34000,
            'selling_price' => 50000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'Busi Nmax Original 2DP PNP Vario PCX ADV',
            'category_id' => 3,
            'vehicle_type_id' => 2,
            'brand_id' => 1,
            'supplier_id' => 1,
            'quantity' => 5,
            'price' => 55000,
            'selling_price' => 60000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'Shell Helix Ultra 5W-30 4L / DEXOS1 / Oli Mobil Full Synthetic - ULTRA GALON',
            'category_id' => 1,
            'vehicle_type_id' => 1,
            'brand_id' => 3,
            'supplier_id' => 2,
            'quantity' => 10,
            'price' => 460000,
            'selling_price' => 560000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'OLI MOTOR KAWASAKI ULTIMATE 4T 10W/40 SEMI SYNTHETIC PELUMAS [1 LITER]',
            'category_id' => 1,
            'vehicle_type_id' => 2,
            'brand_id' => 5,
            'supplier_id' => 4,
            'quantity' => 20,
            'price' => 48900,
            'selling_price' => 70000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'Velg Jari-Jari CHAMP 14x2.50 / 14x250 / 250-14 Warna Black',
            'category_id' => 5,
            'vehicle_type_id' => 2,
            'brand_id' => 4,
            'supplier_id' => 5,
            'quantity' => 20,
            'price' => 260000,
            'selling_price' => 360000,
            'available' => true,
            'item_sold' => 0,
        ]);
        Product::create([
            'name' => 'Ban Mobil Bridgestone Turanza T005A 185/65 R15 15 88V 8',
            'category_id' => 2,
            'vehicle_type_id' => 1,
            'brand_id' => 6,
            'supplier_id' => 3,
            'quantity' => 10,
            'price' => 1050000,
            'selling_price' => 1400000,
            'available' => true,
            'item_sold' => 0,
        ]);
    }
}
