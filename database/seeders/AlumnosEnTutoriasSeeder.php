<?php

namespace Database\Seeders;

use App\Models\AlumnosEnTutorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnosEnTutoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tutoria=1;
        DB::table('alumnos_en_tutorias')->insert([
            'tutoria_id' => $tutoria,
            'alumno_id' => 2,
        ]);

        $tutoria=4;
        DB::table('alumnos_en_tutorias')->insert([
            'tutoria_id' => $tutoria,
            'alumno_id' => 1,
        ]);

        // AlumnosEnTutorias::factory(50)->create();
    }
}
