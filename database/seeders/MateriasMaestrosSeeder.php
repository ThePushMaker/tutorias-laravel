<?php

namespace Database\Seeders;

use App\Models\MateriasMaestros;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriasMaestrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MateriasMaestros::factory(50)->create();
    }
}
