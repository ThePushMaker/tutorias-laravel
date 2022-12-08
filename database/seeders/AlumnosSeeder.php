<?php

namespace Database\Seeders;

use App\Models\Alumnos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->insert([
            'nombre' => 'Daniel Ruiz',
            'correo' => 'druiz_18@alu.uabcs.mx',
            'contraseña' => 'druiz123',
            'tipo_cuenta' => 'Tutor',
            'estado_cuenta' => 'Activa',
            'semestre' => 9,
            'numero_control' => 2018088268,
        ]);

        DB::table('alumnos')->insert([
            'nombre' => 'Pablo Lopéz',
            'correo' => 'plopez_20@alu.uabcs.mx',
            'contraseña' => 'plopez123',
            'tipo_cuenta' => 'Tutor',
            'estado_cuenta' => 'Activa',
            'semestre' => 5,
            'numero_control' => 2020088240,
        ]);


        DB::table('alumnos')->insert([
            'nombre' => 'Luis Sánchez',
            'correo' => 'ssanchez_20@alu.uabcs.mx',
            'contraseña' => 'ssanchez123',
            'tipo_cuenta' => 'Alumno',
            'estado_cuenta' => 'Activa',
            'semestre' => 4,
            'numero_control' => 2020085212,
        ]);
        DB::table('alumnos')->insert([
            'nombre' => 'Javier Pérez',
            'correo' => 'jperez_19@alu.uabcs.mx',
            'contraseña' => 'ssanchez123',
            'tipo_cuenta' => 'Alumno',
            'estado_cuenta' => 'Activa',
            'semestre' => 7,
            'numero_control' => 2020085412,
        ]);

        Alumnos::factory(50)->create();
    }
}
