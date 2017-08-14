<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['id' => '1', 'descripcion' => 'Achuras']);
        DB::table('categorias')->insert(['id' => '2', 'descripcion' => 'Carne de cerdo']);
        DB::table('categorias')->insert(['id' => '3', 'descripcion' => 'Carne vacuna']);
        DB::table('categorias')->insert(['id' => '4', 'descripcion' => 'Cordero']);
        DB::table('categorias')->insert(['id' => '5', 'descripcion' => 'Fiambres']);
    }
}
