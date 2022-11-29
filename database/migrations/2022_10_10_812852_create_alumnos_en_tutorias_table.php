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
        Schema::create('alumnos_en_tutorias', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();
            $table->unsignedBigInteger('tutoria_id');
            $table->foreign('tutoria_id')->references('id')->on('tutorias_disponibles')->onDelete("cascade")->cascadeOnUpdate();
            
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
        Schema::dropIfExists('alumnos_en_tutorias');
    }
};
