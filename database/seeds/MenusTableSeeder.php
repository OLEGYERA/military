<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'name' => 'Головна',
            'alias' => '',
            'parent' => 0,
            'type' => false,
            'access' => false,
        ]);
        DB::table('menus')->insert([
            'name' => 'Категорія офіцерів',
            'alias' => 'officer-category',
            'parent' => 0,
            'type' => false,
            'access' => true,
        ]);
        DB::table('menus')->insert([
            'name' => 'Підготовка офіцерів запасу',
            'alias' => 'training-of-reserve-officers',
            'parent' => 2,
            'type' => false,
            'access' => true,
        ]);
        DB::table('menus')->insert([
            'name' => 'Підготовка офіцерів кадру',
            'alias' => 'training-of-frame-officers',
            'parent' => 2,
            'type' => false,
            'access' => true,
        ]);
        DB::table('menus')->insert([
            'name' => 'Про кафедру',
            'alias' => 'about-the-department',
            'parent' => 0,
            'type' => false,
            'access' => true,
        ]);
        DB::table('menus')->insert([
            'name' => 'Наука',
            'alias' => 'science',
            'parent' => 0,
            'type' => false,
            'access' => true,
        ]);
        DB::table('menus')->insert([
            'name' => 'Контакти',
            'alias' => 'contacts',
            'parent' => 0,
            'type' => false,
            'access' => false,
        ]);

    }
}
