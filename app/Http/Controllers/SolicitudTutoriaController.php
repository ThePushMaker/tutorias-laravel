<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarSolicitudTutoriaRequest;
use App\Http\Requests\GuardarSolicitudTutoriaRequest;
use App\Models\SolicitudesTutorias;
use Illuminate\Http\Request;

class SolicitudTutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes_tutorias = SolicitudesTutorias::get();

        return response([
            'status'    => true,
            'Solicitudes_tutorias' => $solicitudes_tutorias
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
    public function store(GuardarSolicitudTutoriaRequest $request)
    {
        $data = $request->all();

        $solicitud_tutoria = SolicitudesTutorias::create([
            'comentario'        => $data['comentario'],
            'promedio_obtenido' => $data['promedio_obtenido'],
            'estado'            => $data['estado'],
            'materia_id'        => $data['materia_id'],
            'tutor_id'          => $data['tutor_id'],
            'solicitud_tutoria_id'        => $data['solicitud_tutoria_id'],
        ]);

        if($solicitud_tutoria){
            return response([
                'status'   => true,
                'solicitud_tutoria' => $solicitud_tutoria,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la solicitud_tutoria'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudesTutorias $solicitud_tutoria)
    {
        $solicitud_tutoria = SolicitudesTutorias::where('id', $solicitud_tutoria->id)->get();

        if($solicitud_tutoria){
            return response([
                'status'   => true,
                'solicitud_tutoria'   => $solicitud_tutoria
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la solicitud_tutoria'
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
    public function update(ActualizarSolicitudTutoriaRequest $request, SolicitudesTutorias $solicitud_tutoria)
    {
        if($solicitud_tutoria){
            $data = $request->all();
          
            $solicitud_tutoria->comentario          = $data['comentario'];
            $solicitud_tutoria->promedio_obtenido   = $data['promedio_obtenido'];
            $solicitud_tutoria->estado              = $data['estado'];
            $solicitud_tutoria->materia_id          = $data['materia_id'];
            $solicitud_tutoria->tutor_id            = $data['tutor_id'];
            $solicitud_tutoria->maestro_id          = $data['maestro_id'];

            if($solicitud_tutoria->save()){
                return response([
                    'status'   => true,
                    'solicitud_tutoria' => $solicitud_tutoria,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la solicitud_tutoria'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información de la solicitud_tutoria'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudesTutorias $solicitud_tutoria)
    {
        if($solicitud_tutoria->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la solicitud de tutoria"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la solicitud de tutoria"
            ]);
        }
    }
}
