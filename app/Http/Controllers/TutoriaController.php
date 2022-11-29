<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarTutoriaRequest;
use App\Http\Requests\GuardarTutoriaRequest;
use App\Models\TutoriasDisponibles;
use Illuminate\Http\Request;

class TutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutoriasDisponibles = TutoriasDisponibles::get();

        return response([
            'status'    => true,
            'tutoriasDisponibles' => $tutoriasDisponibles
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

        $tutoriaDisponible = TutoriasDisponibles::create([
            'desc_temas_impartir'   => $data['desc_temas_impartir'],
            'horario_pref_sesiones' => $data['horario_pref_sesiones'],
            'alumnos_inscritos'     => $data['alumnos_inscritos'],
            'capacidad_maxima'      => $data['capacidad_maxima'],
            'estado'                => $data['estado'],
            'materia_id'            => $data['materia_id'],
            'tutor_id'              => $data['tutor_id'],
            'solicitud_id'          => $data['solicitud_id'],
        ]);

        if($tutoriaDisponible){
            return response([
                'status'   => true,
                'tutoriaDisponible' => $tutoriaDisponible,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la tutoriaDisponible'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutoriasDisponibles $tutoriaDisponible)
    {
        $tutoriaDisponible = TutoriasDisponibles::where('id', $tutoriaDisponible->id)->get();

        if($tutoriaDisponible){
            return response([
                'status'   => true,
                'tutoriaDisponible'   => $tutoriaDisponible
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la tutoriaDisponible'
            ]); 
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
    public function update(ActualizarTutoriaRequest $request, TutoriasDisponibles $tutoriaDisponible)
    {
        if($tutoriaDisponible){
            $data = $request->all();
          
            $tutoriaDisponible->desc_temas_impartir     = $data['desc_temas_impartir'];
            $tutoriaDisponible->horario_pref_sesiones   = $data['horario_pref_sesiones'];
            $tutoriaDisponible->alumnos_inscritos       = $data['alumnos_inscritos'];
            $tutoriaDisponible->capacidad_maxima        = $data['capacidad_maxima'];
            $tutoriaDisponible->estado                  = $data['estado'];
            $tutoriaDisponible->materia_id              = $data['materia_id'];
            $tutoriaDisponible->tutor_id                = $data['tutor_id'];
            $tutoriaDisponible->solicitud_id            = $data['solicitud_id'];

            if($tutoriaDisponible->save()){
                return response([
                    'status'   => true,
                    'tutoriaDisponible' => $tutoriaDisponible,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la tutoriaDisponible'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del tutoriaDisponible'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutoriasDisponibles $tutoriaDisponible)
    {
        if($tutoriaDisponible->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la tutoria"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la tutoria"
            ]);
        }
    }
}
