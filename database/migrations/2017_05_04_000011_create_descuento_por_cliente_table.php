<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescuentoPorClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuento_por_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('descuento_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('descuento_id')->references('id')->on('descuento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descuento_por_cliente');
    }
}
