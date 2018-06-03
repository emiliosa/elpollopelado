<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoUnidadVentaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_unidad_venta', function (Blueprint $table) {
            $table->integer('pedido_id')->unsigned()->index();
            $table->integer('unidad_venta_id')->unsigned()->index();
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio_unitario', 11, 2);
            $table->primary(['pedido_id', 'unidad_venta_id']);

            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
            $table->foreign('unidad_venta_id')->references('id')->on('unidad_venta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedido_unidad_venta');
    }
}
