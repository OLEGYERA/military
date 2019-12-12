<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Сергей',
            'login' => 'AdminGlobalAccess',
            'password' => bcrypt('123qweasd'),
            'rules' => 0,

        ]);
        DB::table('users')->insert([
            'name' => 'Запас',
            'login' => 'reserve',
            'password' => bcrypt('123qweasd'),
            'rules' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Основа',
            'login' => 'main',
            'password' => bcrypt('123qweasd'),
            'rules' => 2,
        ]);
    }
}
