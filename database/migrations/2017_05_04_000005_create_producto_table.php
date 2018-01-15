<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('codigo')->nullable();
            $table->unsignedInteger('categoria_id');
            $table->string('descripcion');
            $table->unsignedInteger('moneda_id');
            $table->unsignedInteger('precio_unitario');
            $table->unsignedInteger('stock');
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->foreign('moneda_id')->references('id')->on('moneda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
