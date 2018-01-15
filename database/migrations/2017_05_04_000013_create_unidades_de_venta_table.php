<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesDeVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_de_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id');
            $table->string('nro_serie');
            $table->string('estado'); //Disponible - Vendido
            $table->timestamps();

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
        Schema::dropIfExists('unidades_de_venta');
    }
}
