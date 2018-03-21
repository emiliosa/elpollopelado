<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteDescuentoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_descuento', function (Blueprint $table) {
            $table->integer('cliente_id')->unsigned()->index();
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
            $table->integer('descuento_id')->unsigned()->index();
            $table->foreign('descuento_id')->references('id')->on('descuento')->onDelete('cascade');
            $table->primary(['cliente_id', 'descuento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cliente_descuento');
    }
}
