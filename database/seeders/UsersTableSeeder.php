<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Владислав',
                'email' => 'nortung@bk.ru',
                'password' => bcrypt('111'),
                'role' => 'admin',
            ],
            [
                'name' => 'Александр',
                'email' => 'example@example.com',
                'password' => bcrypt('111'),
                'role' => 'manager',
            ],
            [
                'name' => 'Андрей',
                'email' => 'example1@example.com',
                'password' => bcrypt('111'),
                'role' => 'manager',
            ],
            [
                'name' => 'Григорий',
                'email' => 'example2@example.com',
                'password' => bcrypt('111'),
                'role' => 'manager',
            ],
        ]);
        
    }
}
