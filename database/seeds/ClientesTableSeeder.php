<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert(['id' => '1', 'tipo_identificacion_id' => '1', 'identificacion' => '30926055', 'tipo_cliente_id' => '1', 'razon_social' => 'Abarca SA', 'nombre' => 'Emiliano', 'apellido' => 'Abarca', 'email' => 'abarcaemiliano@hotmail.com', 'telefono_celular' => '1551138028', 'telefono_fijo' => '44870439']);
        DB::table('clientes')->insert(['id' => '2', 'tipo_identificacion_id' => '1', 'identificacion' => '31926055', 'tipo_cliente_id' => '1', 'razon_social' => 'Abarca SA', 'nombre' => 'Ariel', 'apellido' => 'Abarca', 'email' => 'abarcaeariel@hotmail.com', 'telefono_celular' => '1551138028', 'telefono_fijo' => '44870439']);
        DB::table('clientes')->insert(['id' => '3', 'tipo_identificacion_id' => '1', 'identificacion' => '32926055', 'tipo_cliente_id' => '1', 'razon_social' => 'Abarca SA', 'nombre' => 'Nicolas', 'apellido' => 'Abarca', 'email' => 'abarcanicolas@hotmail.com', 'telefono_celular' => '1551138028', 'telefono_fijo' => '44870439']);
        DB::table('clientes')->insert(['id' => '4', 'tipo_identificacion_id' => '1', 'identificacion' => '33926055', 'tipo_cliente_id' => '1', 'razon_social' => 'Abarca SA', 'nombre' => 'Miguel', 'apellido' => 'Abarca', 'email' => 'abarcamiguel@hotmail.com', 'telefono_celular' => '1551138028', 'telefono_fijo' => '44870439']);
        DB::table('clientes')->insert(['id' => '5', 'tipo_identificacion_id' => '1', 'identificacion' => '34926055', 'tipo_cliente_id' => '1', 'razon_social' => 'Barqui SA', 'nombre' => 'Ana', 'apellido' => 'Barqui', 'email' => 'barquiana@hotmail.com', 'telefono_celular' => '1551138028', 'telefono_fijo' => '44870439']);
    }
}
