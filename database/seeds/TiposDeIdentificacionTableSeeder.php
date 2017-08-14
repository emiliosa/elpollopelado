<?php

use Illuminate\Database\Seeder;

class TiposDeIdentificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_de_identificacion')->insert(['id' => '1', 'descripcion' => 'CUIL']);
        DB::table('tipos_de_identificacion')->insert(['id' => '2', 'descripcion' => 'CUIT']);
        DB::table('tipos_de_identificacion')->insert(['id' => '3', 'descripcion' => 'DNI']);
    }
}
