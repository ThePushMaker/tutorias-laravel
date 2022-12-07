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
        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_reunion');
            $table->time('hora_reunion');
            $table->string('enlace_reunion');
            $table->string('mensaje')->nullable();
            
            $table->unsignedBigInteger('tutoria_id');
                $table->foreign('tutoria_id')->references('id')->on('tutorias_disponibles')->onDelete("cascade")->cascadeOnUpdate();
            $table->unsignedBigInteger('alumno_id');
                $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();
            $table->unsignedBigInteger('tutor_id');
                $table->foreign('tutor_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();
            $table->unsignedBigInteger('materia_id');
                $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade")->cascadeOnUpdate();
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
        Schema::dropIfExists('sesiones');
    }
};
