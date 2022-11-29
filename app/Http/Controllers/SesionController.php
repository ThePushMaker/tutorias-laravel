<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarSesionRequest;
use App\Http\Requests\GuardarSesionRequest;
use App\Models\Sesiones;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesiones = Sesiones::get();

        return response([
            'status'    => true,
            'sesiones' => $sesiones
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
    public function store(GuardarSesionRequest $request)
    {
        $data = $request->all();

        $sesion = Sesiones::create([
            'nombre'         => $data['fecha_reunion'],
            'correo'         => $data['hora_reunion'],
            'contraseña'     => $data['enlace_reunion'],
            'estado_cuenta'  => $data['mensaje'],
            'estado_cuenta'  => $data['tutoria_id'],
        ]);

        if($sesion){
            return response([
                'status'   => true,
                'sesion' => $sesion,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la sesion'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sesiones $sesion)
    {
        $sesion = Sesiones::where('id', $sesion->id)->get();

        if($sesion){
            return response([
                'status'   => true,
                'sesion'   => $sesion
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la sesion'
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
    public function update(ActualizarSesionRequest $request, Sesiones $sesion)
    {
        if($sesion){
            $data = $request->all();
          
            $sesion->fecha_reunion      = $data['fecha_reunion'];
            $sesion->hora_reunion       = $data['hora_reunion'];
            $sesion->enlace_reunion     = $data['enlace_reunion'];
            $sesion->mensaje            = $data['mensaje'];
            $sesion->tutoria_id         = $data['tutoria_id'];

            if($sesion->save()){
                return response([
                    'status'   => true,
                    'sesion' => $sesion,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la sesion'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del sesion'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesiones $sesion)
    {
        if($sesion->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la sesion"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la sesion"
            ]);
        }
    }
}
