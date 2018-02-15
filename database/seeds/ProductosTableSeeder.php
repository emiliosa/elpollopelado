<?php

use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto')->insert(['id' => '1', 'categoria_id' => '3', 'descripcion' => 'Asado', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '2', 'categoria_id' => '2', 'descripcion' => 'Bife de chorizo', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '3', 'categoria_id' => '2', 'descripcion' => 'Chorizo de cerdo', 'moneda_id' => '1', 'precio_unitario' => '50.00', 'stock' => '2500']);
        DB::table('producto')->insert(['id' => '4', 'categoria_id' => '2', 'descripcion' => 'Bondiola', 'moneda_id' => '1', 'precio_unitario' => '100.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '5', 'categoria_id' => '2', 'descripcion' => 'Carré', 'moneda_id' => '1', 'precio_unitario' => '100.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '6', 'categoria_id' => '2', 'descripcion' => 'Churrascos de cerdo', 'moneda_id' => '1', 'precio_unitario' => '50.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '7', 'categoria_id' => '2', 'descripcion' => 'Matambrito de cerdo', 'moneda_id' => '1', 'precio_unitario' => '70.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '8', 'categoria_id' => '2', 'descripcion' => 'Costillar Cortado ', 'moneda_id' => '1', 'precio_unitario' => '100.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '9', 'categoria_id' => '2', 'descripcion' => 'Cinta de Lomo', 'moneda_id' => '1', 'precio_unitario' => '90.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '10', 'categoria_id' => '3', 'descripcion' => 'Matambre Vacuno Arrollado', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '11', 'categoria_id' => '3', 'descripcion' => 'Vacío', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '12', 'categoria_id' => '3', 'descripcion' => 'Lomo', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '13', 'categoria_id' => '3', 'descripcion' => 'Nalga sin tapa', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '14', 'categoria_id' => '3', 'descripcion' => 'Bola de lomo', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '15', 'categoria_id' => '3', 'descripcion' => 'Cuadrada', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '16', 'categoria_id' => '3', 'descripcion' => 'Peceto', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '17', 'categoria_id' => '3', 'descripcion' => 'Colita de cuadril', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '18', 'categoria_id' => '3', 'descripcion' => 'Corazon de cuadril', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '19', 'categoria_id' => '3', 'descripcion' => 'Tapa de cuadril', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '20', 'categoria_id' => '3', 'descripcion' => 'Tapa de nalga', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '21', 'categoria_id' => '3', 'descripcion' => 'Entraña', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '22', 'categoria_id' => '3', 'descripcion' => 'Matambre', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '23', 'categoria_id' => '3', 'descripcion' => 'Ojo de bife', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '24', 'categoria_id' => '3', 'descripcion' => 'Bife de costilla', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '25', 'categoria_id' => '3', 'descripcion' => 'Paleta', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '26', 'categoria_id' => '3', 'descripcion' => 'Roast beef', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '27', 'categoria_id' => '3', 'descripcion' => 'Tapa de asado', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '28', 'categoria_id' => '3', 'descripcion' => 'Picada especial', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '29', 'categoria_id' => '5', 'descripcion' => 'Pollo entero', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '30', 'categoria_id' => '5', 'descripcion' => 'Supermas de pollo', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
        DB::table('producto')->insert(['id' => '31', 'categoria_id' => '5', 'descripcion' => 'Pata y muslo', 'moneda_id' => '1', 'precio_unitario' => '80.00', 'stock' => '1000']);
    }
}
