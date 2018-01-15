<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert(['id' => '1', 'descripcion' => 'Achuras']);
        DB::table('categoria')->insert(['id' => '2', 'descripcion' => 'Carne de cerdo']);
        DB::table('categoria')->insert(['id' => '3', 'descripcion' => 'Carne vacuna']);
        DB::table('categoria')->insert(['id' => '4', 'descripcion' => 'Cordero']);
        DB::table('categoria')->insert(['id' => '5', 'descripcion' => 'Fiambres']);
    }
}
