<?php

namespace Database\Seeders;


use App\Models\MateriasMaestros;
use App\Models\SolicitudesTutorias;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudesTutoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tutor=1;
        $materia=1;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);
        $materia=2;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);
        $materia=3;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);
        $materia=4;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);
        $materia=5;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);

        $tutor=2;
        $materia=4;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);
        $materia=5;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);
        $materia=6;
        DB::table('solicitudes_tutorias')->insert([
            'comentario' => fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            'estado' =>  'Aceptada',
            'materia_id' =>  $materia,
            'tutor_id' =>  $tutor,
            'maestro_id' =>  MateriasMaestros::get('maestro_id')->where('materia_id', $materia)->first(),
        ]);

        SolicitudesTutorias::factory(5)->create();
    }
}
