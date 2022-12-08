<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Models\Maestros;
use App\Models\Materias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SolicitudesTutoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comentario' =>  fake()->paragraph(1),
            'promedio_obtenido' => fake()->numberBetween(80, 100),
            // 'estado' =>  fake()->randomElement(['Pendiente', 'Aceptada', 'Rechazada']),
            'estado' =>  'Rechazada',
            'materia_id' =>  Materias::all()->random()->id,
            'tutor_id' =>  Alumnos::all()->random()->id,
            'maestro_id' =>  Maestros::all()->random()->id,
        ];
    }
}
