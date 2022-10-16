<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert(['nombre' => 'Programación I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Programación II','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Programación III','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Matemáticas I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Matemáticas II','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Probabilidad y estadística','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Electrónica I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Electrónica II','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Robótica I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Base de datos I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Base de datos II','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Estructura de datos I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Estructura de datos II','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Redes neuronales artificiales','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Programación lógica','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Redes I','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Redes II','descripcion' => fake()->paragraph(1)]);
        DB::table('materias')->insert(['nombre' => 'Redes III','descripcion' => fake()->paragraph(1)]);
    }
}
