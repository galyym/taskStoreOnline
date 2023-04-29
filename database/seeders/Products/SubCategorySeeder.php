<?php

namespace Database\Seeders\Products;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sub_categories")->insert([
            'name' => 'Смартфоны Apple',
            'description' => 'Смартфоны Apple',
            'category_id' => 1
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Смартфоны Samsung',
            'description' => 'Смартфоны Samsung',
            'category_id' => 1
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Ноутбуки Apple',
            'description' => 'Ноутбуки Apple',
            'category_id' => 2
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Игровые ноутбуки',
            'description' => 'Игровые ноутбуки',
            'category_id' => 2
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Ноутбуки для работы',
            'description' => 'Ноутбуки для работы',
            'category_id' => 2
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Телевизоры LG',
            'description' => 'Телевизоры LG',
            'category_id' => 3
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Телевизоры Samsung',
            'description' => 'Телевизоры Samsung',
            'category_id' => 3
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Стиральная машина Bosh',
            'description' => 'Стиральная машина Bosh',
            'category_id' => 4
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Кондиционер LG',
            'description' => 'Кондиционер LG',
            'category_id' => 4
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Печь LG',
            'description' => 'Печь LG',
            'category_id' => 4
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Фотоаппарат Canon',
            'description' => 'Фотоаппарат Canon',
            'category_id' => 5
        ]);
        DB::table("sub_categories")->insert([
            'name' => 'Фотоаппарат Nikon',
            'description' => 'Фотоаппарат Nikon',
            'category_id' => 5
        ]);
    }
}
