<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidad', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partido_id');
            $table->string('codigo_postal')->nullable();
            $table->string('nombre');

            $table->foreign('partido_id')->references('id')->on('partido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidad');
    }
}
