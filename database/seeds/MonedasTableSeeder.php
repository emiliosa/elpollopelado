<?php

use Illuminate\Database\Seeder;

class MonedasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monedas')->insert(['id' => '1', 'denominacion' => 'Peso argentino', 'codigo' => 'ARS', 'simbolo' => '$']);
        DB::table('monedas')->insert(['id' => '2', 'denominacion' => 'Dólar USA', 'codigo' => 'USD', 'simbolo' => 'U$S']);
        DB::table('monedas')->insert(['id' => '3', 'denominacion' => 'Euro', 'codigo' => 'EUR', 'simbolo' => '€']);
        DB::table('monedas')->insert(['id' => '4', 'denominacion' => 'Real bresileño', 'codigo' => 'BRL', 'simbolo' => 'R$']);
    }
}
