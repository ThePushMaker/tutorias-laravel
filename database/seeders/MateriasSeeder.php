<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert(['nombre' => 'Programación I']);
        DB::table('materias')->insert(['nombre' => 'Programación II']);
        DB::table('materias')->insert(['nombre' => 'Programación III']);
        DB::table('materias')->insert(['nombre' => 'Matemáticas I']);
        DB::table('materias')->insert(['nombre' => 'Matemáticas II']);
        DB::table('materias')->insert(['nombre' => 'Probabilidad y estadística']);
        DB::table('materias')->insert(['nombre' => 'Electronica I']);
        DB::table('materias')->insert(['nombre' => 'Electronica II']);
        DB::table('materias')->insert(['nombre' => 'Redes I']);
        DB::table('materias')->insert(['nombre' => 'Redes II']);
        DB::table('materias')->insert(['nombre' => 'Redes III']);
    }
}
