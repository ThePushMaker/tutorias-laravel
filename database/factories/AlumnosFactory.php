<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumnos>
 */
class AlumnosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' =>  fake()->name(),
            'correo' =>  fake()->unique()->safeEmail(),
            'contraseña' =>  fake()->password(),
            'rango' => fake()->randomElement(['Alumno', 'Tutor']),
            'cuenta_activa' =>  fake()->boolean(),
            'semestre' =>  fake()->numberBetween($min = 1, $max = 9),
            'numero_control' => fake()->unique()->numerify('2022######'),
        ];
    }
}
