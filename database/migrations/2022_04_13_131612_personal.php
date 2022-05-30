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



        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('emailPersonal')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->timestamp('fechaContrato');
        
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
           /*  $table->string('nombre'); */
         

           $table->unsignedBigInteger('idPersonal'); // Relación con categorias
            $table->foreign('idPersonal')->references('id')->on('personal')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol');
            $table->integer('estado');
            
        });

        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
           /*  $table->string('nombre'); */
         

           $table->unsignedBigInteger('idUsuario'); // Relación con categorias
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombre')->unique();
            $table->string('descripcion');
           $table->integer('horasPlanificadas');
           $table->string('estado');
           $table->dateTime('fechaInicio');
           $table->dateTime('fechaFin');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('personal');
  
    }
};
