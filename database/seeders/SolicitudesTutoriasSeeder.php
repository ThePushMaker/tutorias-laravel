<?php

namespace Database\Seeders;

use App\Models\SolicitudesTutorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitudesTutoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SolicitudesTutorias::factory(50)->create();
    }
}
