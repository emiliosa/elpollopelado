<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('provincia_id');
            $table->unsignedInteger('partido_id');
            $table->unsignedInteger('localidad_id');
            $table->string('calle');
            $table->string('altura');
            $table->string('piso')->nullable();
            $table->string('dpto')->nullable();
            $table->string('entrecalles')->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('partido_id')->references('id')->on('partidos');
            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
