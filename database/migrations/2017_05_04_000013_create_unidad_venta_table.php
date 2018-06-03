<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->unsignedInteger('producto_precio_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('producto_precio_id')->references('id')->on('producto_precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_venta');
    }
}
