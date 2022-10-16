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
            $table->string('nombre',60);
            $table->string('correo',60)->unique();
            $table->string('contraseña',30);
            $table->set('tipo_cuenta', ['Alumno', 'Tutor'])->default('Alumno');
            $table->set('estado_cuenta', ['Activa', 'Inactiva'])->default('Activa');
            $table->integer('semestre');
            $table->string('numero_control',10)->unique();
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
