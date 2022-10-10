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
        DB::table('materias')->insert(['nombre' => 'Programación I','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Programación II','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Programación III','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Matemáticas I','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Matemáticas II','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Probabilidad y estadística','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Electrónica I','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Electrónica II','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Robótica I','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Base de datos I','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Base de datos II','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Estructura de datos I','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Estructura de datos II','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Redes neuronales artificiales','descripcion' => Str::random(30)]);
        DB::table('materias')->insert(['nombre' => 'Programación lógica']);
        DB::table('materias')->insert(['nombre' => 'Redes I']);
        DB::table('materias')->insert(['nombre' => 'Redes II']);
        DB::table('materias')->insert(['nombre' => 'Redes III']);
    }
}
