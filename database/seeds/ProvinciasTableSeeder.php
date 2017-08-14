<?php

use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert(['id' => '1','nombre' => 'BUENOS AIRES']);
        DB::table('provincias')->insert(['id' => '2','nombre' => 'CATAMARCA']);
        DB::table('provincias')->insert(['id' => '3','nombre' => 'CHACO']);
        DB::table('provincias')->insert(['id' => '4','nombre' => 'CHUBUT']);
        DB::table('provincias')->insert(['id' => '5','nombre' => 'CORDOBA']);
        DB::table('provincias')->insert(['id' => '6','nombre' => 'CORRIENTES']);
        DB::table('provincias')->insert(['id' => '7','nombre' => 'ENTRE RIOS']);
        DB::table('provincias')->insert(['id' => '8','nombre' => 'FORMOSA']);
        DB::table('provincias')->insert(['id' => '9','nombre' => 'JUJUY']);
        DB::table('provincias')->insert(['id' => '10','nombre' => 'LA PAMPA']);
        DB::table('provincias')->insert(['id' => '11','nombre' => 'LA RIOJA']);
        DB::table('provincias')->insert(['id' => '12','nombre' => 'MENDOZA']);
        DB::table('provincias')->insert(['id' => '13','nombre' => 'MISIONES']);
        DB::table('provincias')->insert(['id' => '14','nombre' => 'NEUQUEN']);
        DB::table('provincias')->insert(['id' => '15','nombre' => 'RIO NEGRO']);
        DB::table('provincias')->insert(['id' => '16','nombre' => 'SALTA']);
        DB::table('provincias')->insert(['id' => '17','nombre' => 'SAN JUAN']);
        DB::table('provincias')->insert(['id' => '18','nombre' => 'SAN LUIS']);
        DB::table('provincias')->insert(['id' => '19','nombre' => 'SANTA CRUZ']);
        DB::table('provincias')->insert(['id' => '20','nombre' => 'SANTA FE']);
        DB::table('provincias')->insert(['id' => '21','nombre' => 'SANTIAGO DEL ESTERO']);
        DB::table('provincias')->insert(['id' => '22','nombre' => 'TIERRA DEL FUEGO']);
        DB::table('provincias')->insert(['id' => '23','nombre' => 'TUCUMAN']);
        DB::table('provincias')->insert(['id' => '24','nombre' => 'CIUDAD DE BUENOS AIRES']);
    }
}
