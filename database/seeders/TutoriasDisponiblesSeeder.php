<?php

namespace Database\Seeders;

use App\Models\TutoriasDisponibles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutoriasDisponiblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TutoriasDisponibles::factory(50)->create();
    }
}
