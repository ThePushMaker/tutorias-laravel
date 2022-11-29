<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Models\TutoriasDisponibles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlumnosEnTutoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'alumno_id' =>  Alumnos::all()->random()->id,
            'tutoria_id' =>  TutoriasDisponibles::all()->random()->id,
        ];
    }
}
