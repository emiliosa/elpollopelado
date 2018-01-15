<?php

use Illuminate\Database\Seeder;

class TipoDeIdentificacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_de_identificacion')->insert(['id' => '1', 'descripcion' => 'CUIL']);
        DB::table('tipo_de_identificacion')->insert(['id' => '2', 'descripcion' => 'CUIT']);
        DB::table('tipo_de_identificacion')->insert(['id' => '3', 'descripcion' => 'DNI']);
    }
}
