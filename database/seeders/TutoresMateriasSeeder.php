<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutoresMateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TutoresMaterias::factory(50)->create();
        
        DB::table('tutores_materias')->insert([//incritos
            'tutor_id' => 1,
            'materia_id' => 1,
        ]);
        DB::table('tutores_materias')->insert([
            'tutor_id' => 1,
            'materia_id' => 2,
        ]);
        DB::table('tutores_materias')->insert([
            'tutor_id' => 1,
            'materia_id' => 3,
        ]);
        DB::table('tutores_materias')->insert([ //no creada
            'tutor_id' => 1,
            'materia_id' => 4,
        ]);
        DB::table('tutores_materias')->insert([ //no creada
            'tutor_id' => 1,
            'materia_id' => 5,
        ]);

        DB::table('tutores_materias')->insert([ //incritos
            'tutor_id' => 2,
            'materia_id' => 4,
        ]);
        DB::table('tutores_materias')->insert([
            'tutor_id' => 2,
            'materia_id' => 5,
        ]);
        DB::table('tutores_materias')->insert([ //no creada
            'tutor_id' => 2,
            'materia_id' => 6,
        ]);
    }
}
