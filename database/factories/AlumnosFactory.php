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
            'correo' => preg_replace('/@example\..*/', '@alu.uabcs.mx', fake()->unique()->safeEmail()),
            // 'contraseña' =>  fake()->password(),
            'contraseña' => fake()->password(),
            'tipo_cuenta' => fake()->randomElement(['Alumno', 'Tutor']),
            'estado_cuenta' =>  fake()->randomElement(['Activa', 'Inactiva']),
            'semestre' =>  fake()->numberBetween($min = 1, $max = 9),
            'numero_control' => fake()->unique()->numerify('2022######'),
            // 'avatar' => $faker->imageUrl,
        ];
    }
}
