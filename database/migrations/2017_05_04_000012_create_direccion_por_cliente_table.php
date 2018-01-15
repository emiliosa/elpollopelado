<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionPorClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('direccion_por_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('direccion_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('direccion_id')->references('id')->on('direccion');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('direccion_por_cliente');
    }
}
