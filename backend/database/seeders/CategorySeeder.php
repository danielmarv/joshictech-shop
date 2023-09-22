<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Category 1',
            'description' => 'Description for Category 1',
        ]);

        DB::table('categories')->insert([
            'name' => 'Category 2',
            'description' => 'Description for Category 2',
        ]);

        // Add more category records as needed
    }
}

