<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarMateriaRequest;
use App\Http\Requests\GuardarMateriaRequest;
use App\Models\Materias;
use App\Models\TutoresMaterias;
use App\Models\TutoriasDisponibles;
use Illuminate\Http\Request;
use Mockery\Matcher\Closure;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $materias = Materias::get();

        if($user_id) {
            $filteredMaterias = $materias->filter(function($materia) use ($user_id) {
                return array_reduce(TutoriasDisponibles::where('tutor_id', $user_id)->get()->toArray(), function($carry, $element) use ($materia) {
                    return $carry && $element['materia_id'] !== $materia['id'];
                }, true);
            });
            
    
            return response([
                'status'    => true,
                'materias' => $filteredMaterias->values(),
            ]);
        }
        
        return response([
            'status'    => true,
            'materias' => $materias,
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
    public function store(GuardarMateriaRequest $request)
    {
        $data = $request->all();

        $materia = Materias::create([
            'nombre'         => $data['nombre'],
            'descripcion'    => $data['descripcion'],
        ]);

        if($materia){
            return response([
                'status'   => true,
                'materia' => $materia,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar la materia'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Materias $materia)
    {
        $materia = Materias::where('id', $materia->id)->get();

        if($materia){
            return response([
                'status'    => true,
                'materia'   => $materia
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información de la materia'
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
    public function update(ActualizarMateriaRequest $request, Materias $materia)
    {
        if($materia){
            $data = $request->all();
          
            $materia->nombre        = $data['nombre'];
            $materia->descripcion   = $data['descripcion'];

            if($materia->save()){
                return response([
                    'status'  => true,
                    'materia' => $materia,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar la materia'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información de la materia'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias $materia)
    {
        if($materia->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado la materia"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar la materia"
            ]);
        }
    }
}
