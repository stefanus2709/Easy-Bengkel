<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Oli'
        ]);

        Category::create([
            'name' => 'Ban'
        ]);

        Category::create([
            'name' => 'Busi'
        ]);

        Category::create([
            'name' => 'Kampas Rem'
        ]);

        Category::create([
            'name' => 'Velg'
        ]);
    }
}
