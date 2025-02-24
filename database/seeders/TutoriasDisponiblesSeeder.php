<?php

namespace Database\Seeders;

use App\Services\ZoomService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use MacsiDigital\Zoom\Facades\Zoom;

class TutoriasDisponiblesSeeder extends Seeder
{
    protected $zoomService;
    
    public function __construct(ZoomService $zoomService)
    {
        $this->zoomService = $zoomService;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TutoriasDisponibles::factory(50)->create();

        // $user = Zoom::user()->first();
        $user = $this->zoomService->getFirstUser();
        
        if(!$user) {
            throw new \Exception('No se encontró ningun usuario en Zoom.');
        }
        
        $meetingData = [
            'topic' => 'Tutoria: test',
            'type' => 8,
            'start_time' => new Carbon("now"),
            'duration' => 60,
            'recurrence' => [
                'type' => 2, // 2 = Weekly
                'repeat_interval' => 1, // 1 = Every week
                'weekly_days' => "1", // 1 = Sunday, 2 = Monday, ..., 7 = Saturday
                'end_times' => 5 // occurences 5 = 5 times
            ],
            'settings' => [
                'join_before_host' => true,
                'approval_type' => 1,
                'registration_type' => 2,
                'enforce_login' => false,
                'waiting_room' => false,
            ]
        ];
        
        // $meeting = Zoom::meeting()->make([
        //     'topic' => 'Tutoria: test',
        //     'type' => 8,
        //     'start_time' => new Carbon("now"),
        //     // best to use a Carbon instance here.
        //     'duration' => 60,
        // ]);

        // $meeting->recurrence()->make([
        //     'type' => 2,
        //     'repeat_interval' => 0,
        //     'weekly_days' => "0",
        //     'end_times' => 5
        // ]);

        // $meeting->settings()->make([
        //     'join_before_host' => true,
        //     'approval_type' => 1,
        //     'registration_type' => 2,
        //     'enforce_login' => false,
        //     'waiting_room' => false,
        // ]);
        // $user->meetings()->save($meeting);

        // $join_url = $meeting->join_url;
        
        $meeting = $this->zoomService->createMeeting($user['id'], $meetingData);
        $join_url = $meeting['join_url'] ?? null;
        
        if (!$join_url) {
            throw new \Exception('No se pudo crear la reunion en Zoom.');
        }

        $tutor=1;
        $materia=1;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => $join_url,
            'estado' => 'Activa',
            'capacidad_maxima' => 3,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=2;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => $join_url,
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=3;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => $join_url,
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $tutor=2;
        $materia=4;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => $join_url,
            'estado' => 'Activa',
            'capacidad_maxima' => 3,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=5;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => $join_url,
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);
        $materia=6;
        DB::table('tutorias_disponibles')->insert([
            'temas' => fake()->paragraph(1),
            'fecha_reunion' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'hora_reunion' => fake()->time('H:i'),
            'enlace_reunion' => $join_url,
            'estado' => 'Activa',
            'capacidad_maxima' => 4,
            'materia_id' => $materia,
            'tutor_id' => $tutor,
        ]);

            // 'desc_temas_impartir' =>  fake()->paragraph(1),
            // 'horario_pref_sesiones' => fake()->time('H:i'),
            // 'capacidad_maxima' => fake()->numberBetween(1, 3),
            // 'estado' =>  fake()->randomElement(['Activa', 'Inactiva']),
            // 'materia_id' =>  Materias::all()->random()->id,
            // 'tutor_id' =>  Alumnos::all()->where('tipo_cuenta', 'Tutor')->random()->id,
            // 'solicitud_id' =>  SolicitudesTutorias::all()->random()->id,
    }
}
