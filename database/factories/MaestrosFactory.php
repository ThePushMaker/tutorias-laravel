<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maestros>
 */
class MaestrosFactory extends Factory
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
            'correo' => preg_replace('/@example\..*/', '@uabcs.mx', fake()->unique()->safeEmail()),
            'contraseña' =>  fake()->password(),
            'estado_cuenta' =>  fake()->randomElement(['Activa', 'Inactiva']),
        ];
    }
}
