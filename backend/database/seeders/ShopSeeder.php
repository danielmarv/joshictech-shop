<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    public function run()
    {
        DB::table('shops')->insert([
            'name' => 'Shop 1',
            'description' => 'Description for Shop 1',
            'address' => 'Address 1',
            'contact' => 'Contact 1',
        ]);

        DB::table('shops')->insert([
            'name' => 'Shop 2',
            'description' => 'Description for Shop 2',
            'address' => 'Address 2',
            'contact' => 'Contact 2',
        ]);

        // Add more shop records as needed
    }
}

