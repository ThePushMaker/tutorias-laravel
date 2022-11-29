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
        Schema::create('solicitudes_tutorias', function (Blueprint $table) {
            $table->id();
            $table->string('comentario')->nullable();
            $table->integer('promedio_obtenido');//cuando la cursó el tutor
            $table->set('estado', ['Pendiente', 'Aceptada','Rechazada'])->default('Pendiente');
            
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete("cascade")->cascadeOnUpdate();
            
            $table->unsignedBigInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();//cuenta tutor
            
            $table->unsignedBigInteger('maestro_id')->nullable();
            $table->foreign('maestro_id')->references('id')->on('maestros')->onDelete("cascade")->cascadeOnUpdate()->nullable();//maestro que le aprobo o desaprobo dar tutorias
            
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
        Schema::dropIfExists('solicitudes_tutorias');
    }
};
