<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name'  => 'juan',
        'nombre' => 'Juan Gutierrez',
        'nivel' => 1,
        'email'     => 'geovannyp@aduanaldelvalle.mx',
        'password'  => bcrypt('123456')
        ]);
    }
}
