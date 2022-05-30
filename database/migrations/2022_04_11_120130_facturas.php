<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('entidad');
            $table->string('direccion');
            $table->string('email');
            $table->string('telefono');
            $table->timestamp('fecha');
        
        });
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCliente'); // Relación con categorias
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamp('fecha');
            $table->string('concepto');
            $table->string('ruta');
            $table->integer('total');
        
        });

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
        Schema::dropIfExists('clientes');

    }
};
