<?php
use Illuminate\Support\Facades\Hash;
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

        $todayDate = date("Y-m-d");

        DB::table("personal")
        ->insert([
            "id"=>1,
            "nombre" => "empleadoDefecto",
            "emailPersonal" => "empleadoDefecto@gmail.com",
            "direccion" => "Empleado Direccion",
            "telefono" => "123456789",
            "fechaContrato" =>$todayDate,
        ]);

        
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

        DB::table("users")
        ->insert([
            "id"=>1,
            "idPersonal" => 1,
            "email" => "usuario1@gmail.com",
            "password" => Hash::make("123456"),
            "rol" => "Admin",
            "estado" =>1,
        ]);

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
