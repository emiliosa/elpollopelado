<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProductoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->integer('pedido_id')->unsigned()->index();
            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
            $table->integer('producto_id')->unsigned()->index();
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio_unitario', 11, 2);
            $table->primary(['pedido_id', 'producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedido_producto');
    }
}
