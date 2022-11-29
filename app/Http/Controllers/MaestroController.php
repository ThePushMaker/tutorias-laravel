<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarMaestroRequest;
use App\Http\Requests\GuardarMaestroRequest;
use App\Models\Maestros;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestros = Maestros::get();

        return response([
            'status'    => true,
            'maestros' => $maestros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarMaestroRequest $request)
    {
        $data = $request->all();

        $maestro = Maestros::create([
            'nombre'         => $data['nombre'],
            'correo'         => $data['correo'],
            'contraseña'     => $data['contraseña'],
            'estado_cuenta'  => $data['estado_cuenta'],
        ]);

        if($maestro){
            return response([
                'status'   => true,
                'sucursal' => $maestro,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar al maestro'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Maestros $maestro)
    {
        $maestro = Maestros::where('id', $maestro->id)->get();

        if($maestro){
            return response([
                'status'   => true,
                'maestro'   => $maestro
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información del maestro'
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
    public function update(ActualizarMaestroRequest $request, Maestros $maestro)
    {
        if($maestro){
            $data = $request->all();
          
            $maestro->nombre         = $data['nombre'];
            $maestro->correo         = $data['correo'];
            $maestro->contraseña     = $data['contraseña'];
            $maestro->estado_cuenta  = $data['estado_cuenta'];

            if($maestro->save()){
                return response([
                    'status'   => true,
                    'maestro' => $maestro,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar el maestro'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del maestro'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestros $maestro)
    {
        if($maestro->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado al maestro"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar al maestro"
            ]);
        }
    }
}
