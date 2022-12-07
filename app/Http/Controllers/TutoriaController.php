<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarTutoriaRequest;
use App\Http\Requests\GuardarTutoriaRequest;
use App\Models\tutoria;
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
        $tutoria = TutoriasDisponibles::with('solicitud')->with('tutor')->with('materia')->get();

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
            'desc_temas_impartir'   => $data['desc_temas_impartir'],
            'horario_pref_sesiones' => $data['horario_pref_sesiones'],
            'capacidad_maxima'      => $data['capacidad_maxima'],
            'estado'                => $data['estado'],
            'materia_id'            => $data['materia_id'],
            'tutor_id'              => $data['tutor_id'],
            'solicitud_id'          => $data['solicitud_id'],
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
            ]);
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
        $tutoria = TutoriasDisponibles::where('id', $tutoria->id)->with('solicitud')->with('tutor')->with('materia')->get();

        if($tutoria){
            return response([
                'status'   => true,
                'tutoria'   => $tutoria
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la tutoria'
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
    public function update(ActualizarTutoriaRequest $request, TutoriasDisponibles $tutoria)
    {
        if($tutoria){
            $data = $request->all();
          
            $tutoria->desc_temas_impartir     = $data['desc_temas_impartir'];
            $tutoria->horario_pref_sesiones   = $data['horario_pref_sesiones'];
            $tutoria->capacidad_maxima        = $data['capacidad_maxima'];
            $tutoria->estado                  = $data['estado'];
            $tutoria->materia_id              = $data['materia_id'];
            $tutoria->tutor_id                = $data['tutor_id'];
            $tutoria->solicitud_id            = $data['solicitud_id'];

            if($tutoria->save()){
                return response([
                    'status'   => true,
                    'tutoria' => $tutoria,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la tutoria'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del tutoria'
            ]);
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
            ]);
        }
    }
}
