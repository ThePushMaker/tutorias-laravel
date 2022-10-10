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
        Schema::create('tutorias_disponibles', function (Blueprint $table) {
            $table->id();
            $table->string('Desc_temas_impartir');//descripción de los temas a impartir
            $table->string('horario_pref_sesiones');
            $table->integer('alumnos_inscritos');//a la tutoria 
            $table->integer('capacidad_maxima');//de alumnos 
            $table->timestamps();
            
            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade")->cascadeOnUpdate();
            
            $table->unsignedBigInteger('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes_tutorias')->onDelete("cascade")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutorias_disponibles');
    }
};
