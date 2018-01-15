<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_detalle', function (Blueprint $table) {
            $table->unsignedInteger('pedido_id');
            $table->unsignedInteger('producto_id');

            $table->foreign('pedido_id')->references('id')->on('pedido');
            $table->foreign('producto_id')->references('id')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_detalle');
    }
}
