<?php

use Illuminate\Database\Seeder;

class ProvinciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincia')->insert(['id' => '1','nombre' => 'BUENOS AIRES']);
        DB::table('provincia')->insert(['id' => '2','nombre' => 'CATAMARCA']);
        DB::table('provincia')->insert(['id' => '3','nombre' => 'CHACO']);
        DB::table('provincia')->insert(['id' => '4','nombre' => 'CHUBUT']);
        DB::table('provincia')->insert(['id' => '5','nombre' => 'CORDOBA']);
        DB::table('provincia')->insert(['id' => '6','nombre' => 'CORRIENTES']);
        DB::table('provincia')->insert(['id' => '7','nombre' => 'ENTRE RIOS']);
        DB::table('provincia')->insert(['id' => '8','nombre' => 'FORMOSA']);
        DB::table('provincia')->insert(['id' => '9','nombre' => 'JUJUY']);
        DB::table('provincia')->insert(['id' => '10','nombre' => 'LA PAMPA']);
        DB::table('provincia')->insert(['id' => '11','nombre' => 'LA RIOJA']);
        DB::table('provincia')->insert(['id' => '12','nombre' => 'MENDOZA']);
        DB::table('provincia')->insert(['id' => '13','nombre' => 'MISIONES']);
        DB::table('provincia')->insert(['id' => '14','nombre' => 'NEUQUEN']);
        DB::table('provincia')->insert(['id' => '15','nombre' => 'RIO NEGRO']);
        DB::table('provincia')->insert(['id' => '16','nombre' => 'SALTA']);
        DB::table('provincia')->insert(['id' => '17','nombre' => 'SAN JUAN']);
        DB::table('provincia')->insert(['id' => '18','nombre' => 'SAN LUIS']);
        DB::table('provincia')->insert(['id' => '19','nombre' => 'SANTA CRUZ']);
        DB::table('provincia')->insert(['id' => '20','nombre' => 'SANTA FE']);
        DB::table('provincia')->insert(['id' => '21','nombre' => 'SANTIAGO DEL ESTERO']);
        DB::table('provincia')->insert(['id' => '22','nombre' => 'TIERRA DEL FUEGO']);
        DB::table('provincia')->insert(['id' => '23','nombre' => 'TUCUMAN']);
        DB::table('provincia')->insert(['id' => '24','nombre' => 'CIUDAD DE BUENOS AIRES']);
    }
}
