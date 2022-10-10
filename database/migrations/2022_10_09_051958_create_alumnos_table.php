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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->boolean('rango_tutor');//si es tutor o no
            $table->boolean('cuenta_activa');//estado de cuenta
            $table->integer('semestre');
            $table->integer('numero_control')->unique();
            $table->string('descripcion')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
