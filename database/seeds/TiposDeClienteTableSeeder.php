<?php

use Illuminate\Database\Seeder;

class TipoDeClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_de_cliente')->insert(['id' => '1', 'descripcion' => 'Persona física']);
        DB::table('tipo_de_cliente')->insert(['id' => '2', 'descripcion' => 'Persona jurídica']);
    }
}
