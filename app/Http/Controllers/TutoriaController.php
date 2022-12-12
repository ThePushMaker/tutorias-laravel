<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarTutoriaRequest;
use App\Http\Requests\GuardarTutoriaRequest;
use App\Models\Alumnos;
use App\Models\Materias;
use App\Models\TutoriasDisponibles;
use App\Models\AlumnosEnTutorias;
use Carbon\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

class TutoriaController extends Controller
{

    public function getTutoriasCreadas($tutor_id)
    {
        $tutorias_creadas = TutoriasDisponibles::where('tutor_id', $tutor_id)->get();

        foreach ($tutorias_creadas as $tutoria) {
            $alumnos_inscritos = AlumnosEnTutorias::where('tutoria_id', $tutoria->id)->with('alumno')->get();
            $tutoria->alumnos_inscritos = $alumnos_inscritos;

            $materia = Materias::where('id', $tutoria->id)->first();
            $tutoria->materia = $materia;
        }

        if ($tutorias_creadas) {
            return response([
                'status' => true,
                'tutorias_creadas' => $tutorias_creadas,
            ]);
        } else {
            return response([
                'status' => false,
                'msg' => 'Ocurrio un error al intentar obtener las tutorias_creadas'
            ], 403);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoria = TutoriasDisponibles::with('tutor')->with('materia')->get();

        return response([
            'status' => true,
            'tutoria' => $tutoria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarTutoriaRequest $request)
    {
        $data = $request->all();

        $tutoria = TutoriasDisponibles::create([
            'temas' => $data['temas'],
            'fecha_reunion' => $data['fecha_reunion'],
            'hora_reunion' => $data['hora_reunion'],
            'estado' => 'Activa',
            'capacidad_maxima' => $data['capacidad_maxima'],
            'materia_id' => $data['materia_id'],
            'tutor_id' => $data['tutor_id'],
            'enlace_reunion' => ''
        ]);

        if ($tutoria) {
            $materia = Materias::where("id", $data['materia_id'])->first();

            $user = Zoom::user()->first();
            $meeting = Zoom::meeting()->make([
                'topic' => 'Tutoria: ' . $materia->nombre,
                'type' => 8,
                'start_time' => new Carbon(Carbon::parse($data['fecha_reunion'] . ' ' . $data['hora_reunion'], 'America/Mazatlan')),
                // best to use a Carbon instance here.
                'duration' => 60,
            ]);

            $meeting->recurrence()->make([
                'type' => 2,
                'repeat_interval' => 0,
                'weekly_days' => "0",
                'end_times' => 5
            ]);

            $meeting->settings()->make([
                'join_before_host' => true,
                'approval_type' => 1,
                'registration_type' => 2,
                'enforce_login' => false,
                'waiting_room' => false,
            ]);

            if ($user->meetings()->save($meeting)) {
                $tutoria->enlace_reunion = $meeting->join_url;

                if($tutoria->save()) {
                    return response([
                        'status' => true,
                        'tutoria' => $tutoria,
                    ]);
                } 
            }
        }

        return response([
            'status' => false,
            'msg' => 'Ocurrio un error al intentar guardar la tutoria'
        ], 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutoriasDisponibles $tutoria)
    {
        $tutoria = TutoriasDisponibles::where('id', $tutoria->id)->with('tutor')->with('materia')->get();

        if ($tutoria) {
            return response([
                'status' => true,
                'tutoria' => $tutoria
            ]);
        } else {
            return response([
                'status' => true,
                'msg' => 'No se pudo encontrar la información de la tutoria'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarTutoriaRequest $request, TutoriasDisponibles $tutoria)
    {
        if ($tutoria) {
            $data = $request->all();

            $tutoria->temas = $data['temas'];
            $tutoria->fecha_reunion = $data['fecha_reunion'];
            $tutoria->hora_reunion = $data['hora_reunion'];
            $tutoria->enlace_reunion = $data['enlace_reunion'];
            $tutoria->estado = $data['estado'];
            $tutoria->capacidad_maxima = $data['capacidad_maxima'];
            $tutoria->materia_id = $data['materia_id'];
            $tutoria->tutor_id = $data['tutor_id'];

            if ($tutoria->save()) {
                return response([
                    'status' => true,
                    'tutoria' => $tutoria,
                ]);
            } else {
                return response([
                    'status' => false,
                    'msg' => 'Ocurrio un error al intentar actualizar la tutoria'
                ], 403);
            }
        } else {
            return response([
                'status' => false,
                'msg' => 'No se pudo obtener la información del tutoria'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutoriasDisponibles $tutoria)
    {
        if ($tutoria->delete()) {
            return response([
                'status' => true,
                'msg' => "Se ha eliminado la tutoria"
            ]);
        } else {
            return response([
                'status' => false,
                'msg' => "No fue posible eliminar la tutoria"
            ], 403);
        }
    }
}