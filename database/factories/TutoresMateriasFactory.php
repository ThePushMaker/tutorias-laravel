<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Models\Materias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TutoresMaterias>
 */
class TutoresMateriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tutor_id' =>  Alumnos::all()->random()->id,
            'materia_id' =>  Materias::all()->random()->id,
        ];
    }
}
