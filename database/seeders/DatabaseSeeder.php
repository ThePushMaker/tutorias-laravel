<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->truncateTables([//primero vacia las tablas del array
            'materias',
            'alumnos',
            'maestros',
            'solicitudes_tutorias',
        ]);

        // Ejecutar los seeders:
        $this->call(MateriasSeeder::class);
        $this->call(AlumnosSeeder::class);
        $this->call(MaestrosSeeder::class);
        $this->call(SolicitudesTutoriasSeeder::class);
        
    }


    public function truncateTables(array $tables)//para eliminarlas hay que deshabilitar claves foraneas, eliminar y luego volverlas a activar
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
