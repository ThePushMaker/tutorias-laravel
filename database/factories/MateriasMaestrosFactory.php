<?php

namespace Database\Factories;

use App\Models\Maestros;
use App\Models\Materias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\materias_maestros>
 */
class MateriasMaestrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'maestro_id' =>  Maestros::all()->random()->id,
            'materia_id' =>  Materias::all()->random()->id,
        ];
    }
}
