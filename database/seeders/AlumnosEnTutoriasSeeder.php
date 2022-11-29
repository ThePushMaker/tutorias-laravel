<?php

namespace Database\Seeders;

use App\Models\AlumnosEnTutorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosEnTutoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AlumnosEnTutorias::factory(50)->create();
    }
}
