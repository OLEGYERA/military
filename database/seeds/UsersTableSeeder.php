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


        DB::table('menus')->insert([
            'name' => 'Головна',
            'alias' => '',
            'parent' => 0,
            'drop' => false,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Категорія офіцерів',
            'alias' => 'officer-category',
            'parent' => 0,
            'drop' => true,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Підготовка офіцерів запасу',
            'alias' => 'training-of-reserve-officers',
            'parent' => 2,
            'drop' => true,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Головна',
            'alias' => 'main',
            'parent' => 3,
            'drop' => false,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Підготовка офіцерів кадру',
            'alias' => 'training-of-frame-officers',
            'parent' => 2,
            'drop' => true,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Головна',
            'alias' => 'main',
            'parent' => 5,
            'drop' => false,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Про кафедру',
            'alias' => 'about-the-department',
            'parent' => 0,
            'drop' => true,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Наука',
            'alias' => 'science',
            'parent' => 0,
            'drop' => true,
            'delete' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Контакти',
            'alias' => 'contacts',
            'parent' => 0,
            'drop' => false,
            'delete' => false,
        ]);

    }
}
