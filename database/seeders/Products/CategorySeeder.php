<?php

namespace Database\Seeders\Products;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            'name' => 'Смартфоны',
            'description' => 'Смартфоны',
        ]);
        DB::table("categories")->insert([
            'name' => 'Ноутбуки и компьютеры',
            'description' => 'Ноутбуки и компьютеры',
        ]);
        DB::table("categories")->insert([
            'name' => 'ТВ, аудио и музыкальные инструменты',
            'description' => 'Мобильный телефоны',
        ]);
        DB::table("categories")->insert([
            'name' => 'Бытовая техника',
            'description' => 'Бытовая техника',
        ]);
        DB::table("categories")->insert([
            'name' => 'Фототехника',
            'description' => 'Фототехника',
        ]);
    }
}
