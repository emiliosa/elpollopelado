<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_envio');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('descuento_id');
            $table->unsignedInteger('direccion_envio_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('descuento_id')->references('id')->on('descuento');
            $table->foreign('direccion_envio_id')->references('id')->on('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
