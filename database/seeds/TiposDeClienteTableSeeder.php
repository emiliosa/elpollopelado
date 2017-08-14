<?php

use Illuminate\Database\Seeder;

class TiposDeClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_de_cliente')->insert(['id' => '1', 'descripcion' => 'Persona física']);
        DB::table('tipos_de_cliente')->insert(['id' => '2', 'descripcion' => 'Persona jurídica']);
    }
}
