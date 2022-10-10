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
            'rango_tutor' =>  fake()->boolean(),
            'cuenta_activa' =>  fake()->boolean(),
            'semestre' =>  fake()->numberBetween($min = 1, $max = 12),
            'numero_control' => fake()->numerify('2022######'),
            'descripcion' => fake()->paragraph(),
        ];
    }
}
