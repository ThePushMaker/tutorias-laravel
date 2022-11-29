<?php

namespace Database\Factories;

use App\Models\TutoriasDisponibles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sesiones>
 */
class SesionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha_reunion' =>  fake()->dateTimeBetween('now', '+1 month'),
            'hora_reunion' => fake()->time(),
            'enlace_reunion' =>  fake()->url(),
            'mensaje' =>  fake()->paragraph(1),
            'tutoria_id' =>  TutoriasDisponibles::all()->random()->id,
        ];
    }
}
