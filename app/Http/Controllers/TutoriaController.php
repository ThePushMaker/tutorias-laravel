<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarTutoriaRequest;
use App\Http\Requests\GuardarTutoriaRequest;
use App\Models\tutoria;
use App\Models\TutoriasDisponibles;
use App\Models\AlumnosEnTutorias;
use Illuminate\Http\Request;

class TutoriaController extends Controller
{

    public function getTutoriasCreadas($tutor_id){
        $tutorias_creadas=TutoriasDisponibles::where('tutor_id',$tutor_id)->with('materia.materia')->get();
        
        foreach ($tutorias_creadas as $tutoria) {
            $alumnos_inscritos = AlumnosEnTutorias::where('tutoria_id',$tutoria->materia_id)->with('alumno')->get();
            $tutoria->alumnos_inscritos = $alumnos_inscritos;
        }

        if($tutorias_creadas){
            return response([
                'status'   => true,
                'tutorias_creadas' => $tutorias_creadas,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar obtener las tutorias_creadas'
            ],403);
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
            'status'    => true,
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
            'temas'             => $data['temas'],
            'fecha_reunion'     => $data['fecha_reunion'],
            'hora_reunion'      => $data['hora_reunion'],
            'enlace_reunion'    => $data['enlace_reunion'],
            'estado'            => 'Activa',
            'capacidad_maxima'  => $data['capacidad_maxima'],
            'materia_id'        => $data['materia_id'],
            'tutor_id'          => $data['tutor_id'],
        ]);

        if($tutoria){
            return response([
                'status'   => true,
                'tutoria' => $tutoria,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la tutoria'
            ],403);
        }
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

        if($tutoria){
            return response([
                'status'   => true,
                'tutoria'   => $tutoria
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la tutoria'
            ],404); 
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
        if($tutoria){
            $data = $request->all();
          
            $tutoria->temas               = $data['temas'];
            $tutoria->fecha_reunion       = $data['fecha_reunion'];
            $tutoria->hora_reunion        = $data['hora_reunion'];
            $tutoria->enlace_reunion      = $data['enlace_reunion'];
            $tutoria->estado              = $data['estado'];
            $tutoria->capacidad_maxima    = $data['capacidad_maxima'];
            $tutoria->materia_id          = $data['materia_id'];
            $tutoria->tutor_id            = $data['tutor_id'];

            if($tutoria->save()){
                return response([
                    'status'   => true,
                    'tutoria' => $tutoria,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la tutoria'
                ],403);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del tutoria'
            ],404);
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
        if($tutoria->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la tutoria"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la tutoria"
            ],403);
        }
    }
}
