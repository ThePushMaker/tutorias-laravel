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
        Schema::create('tutores_materias', function (Blueprint $table) {
            $table->id();

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
        Schema::dropIfExists('tutores_materias');
    }
};
