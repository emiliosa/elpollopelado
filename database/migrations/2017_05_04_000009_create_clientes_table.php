<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_identificacion_id');
            $table->integer('identificacion');
            $table->unsignedInteger('tipo_cliente_id');
            $table->string('razon_social');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email');
            $table->string('telefono_celular');
            $table->string('telefono_fijo')->nullable();
            $table->timestamps();

            $table->foreign('tipo_identificacion_id')->references('id')->on('tipos_de_identificacion'); //DNI - CUIL - CUIT
            $table->foreign('tipo_cliente_id')->references('id')->on('tipos_de_cliente'); //Persona - Empresa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
