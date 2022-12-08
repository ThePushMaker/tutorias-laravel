<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutoriasDisponiblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TutoriasDisponibles::factory(50)->create();

        $tutor=1;
        $materia=1;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => 'https://meet.google.com/hsm-unbm-daa',
            'estado' => 'Activa',
            'capacidad_maxima' => 3,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=2;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => 'https://meet.google.com/hsm-unbm-daa',
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=3;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => 'https://meet.google.com/hsm-unbm-daa',
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $tutor=2;
        $materia=4;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => 'https://meet.google.com/hsm-unbm-daa',
            'estado' => 'Activa',
            'capacidad_maxima' => 3,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=5;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => 'https://meet.google.com/hsm-unbm-daa',
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=6;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => 'https://meet.google.com/hsm-unbm-daa',
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);

            // 'desc_temas_impartir' =>  fake()->paragraph(1),
            // 'horario_pref_sesiones' => fake()->time('H:i'),
            // 'capacidad_maxima' => fake()->numberBetween(1, 3),
            // 'estado' =>  fake()->randomElement(['Activa', 'Inactiva']),
            // 'materia_id' =>  Materias::all()->random()->id,
            // 'tutor_id' =>  Alumnos::all()->where('tipo_cuenta', 'Tutor')->random()->id,
            // 'solicitud_id' =>  SolicitudesTutorias::all()->random()->id,
    }
}
