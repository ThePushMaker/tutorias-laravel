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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('contenido');
            $table->timestamps();

            $table->unsignedBigInteger('emisor_id');
            $table->foreign('emisor_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();
            $table->unsignedBigInteger('receptor_id');
            $table->foreign('receptor_id')->references('id')->on('alumnos')->onDelete("cascade")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
