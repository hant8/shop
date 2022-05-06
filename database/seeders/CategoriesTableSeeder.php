<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Бытовая техника'
            ],
            [
                'name' => 'Смартфоны и гаджеты'
            ],
            [
                'name' => 'Отдых и развлечения'
            ],   
        ]);
        
    }
}
