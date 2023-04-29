<?php

namespace Database\Seeders\Products;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("brands")->insert([
            'name' => 'LG',
            'description' => 'LG',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'Samsung',
            'description' => 'Samsung',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'Apple',
            'description' => 'Apple',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'Bosh',
            'description' => 'Bosh',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'Canon',
            'description' => 'Nikon',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'Asus',
            'description' => 'Asus',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'Lenovo',
            'description' => 'Lenovo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table("brands")->insert([
            'name' => 'HP',
            'description' => 'HP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
