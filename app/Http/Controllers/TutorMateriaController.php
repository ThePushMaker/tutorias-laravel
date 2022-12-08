<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarTutoresMateriasRequest;
use App\Http\Requests\GuardarTutoresMateriasRequest;
use App\Models\TutoresMaterias;
use Illuminate\Http\Request;

class TutorMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutores_Materias = TutoresMaterias::with('materia')->with('tutor')->get();

        return response([
            'status'    => true,
            'AlumnosEnTutorias' => $tutores_Materias
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
    public function store(GuardarTutoresMateriasRequest $request)
    {
            $data = $request->all();

            $tutor_materia = TutoresMaterias::create([
                'tutor_id'         => $data['tutor_id'],
                'materia_id'         => $data['materia_id'],
            ]);
    
            if($tutor_materia){
                return response([
                    'status'   => true,
                    'tutor_materia' => $tutor_materia,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar guardar al tutor_materia'
                ],403);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutoresMaterias $tutor_materia)
    {
        $tutor_materia = TutoresMaterias::where('id', $tutor_materia->id)->with('materia')->with('tutor')->get();

        if($tutor_materia){
            return response([
                'status'   => true,
                'tutor_materia'   => $tutor_materia
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información del tutor_materia'
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
    public function update(ActualizarTutoresMateriasRequest $request, TutoresMaterias $tutor_materia)
    {
        if($tutor_materia){
            $data = $request->all();
          
            $tutor_materia->tutor_id         = $data['tutor_id'];
            $tutor_materia->materia_id       = $data['materia_id'];

            if($tutor_materia->save()){
                return response([
                    'status'   => true,
                    'tutor_materia' => $tutor_materia,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar el tutor_materia'
                ],403);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del alumno_tutoria'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutoresMaterias $tutor_materia)
    {
        if($tutor_materia->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado al tutores_materias"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar al tutores_materias"
            ],403);
        }
    }
}
