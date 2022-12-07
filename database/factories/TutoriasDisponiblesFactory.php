<?php

namespace Database\Factories;

use App\Models\Alumnos;
use App\Models\Materias;
use App\Models\SolicitudesTutorias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TutoriasDisponiblesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'desc_temas_impartir' =>  fake()->paragraph(1),
            'horario_pref_sesiones' => fake()->time('H:i'),
            'capacidad_maxima' => fake()->numberBetween(1, 3),
            'estado' =>  fake()->randomElement(['Activa', 'Inactiva']),
            'materia_id' =>  Materias::all()->random()->id,
            'tutor_id' =>  Alumnos::all()->where('tipo_cuenta', 'Tutor')->random()->id,
            'solicitud_id' =>  SolicitudesTutorias::all()->random()->id,
        ];
    }
}
