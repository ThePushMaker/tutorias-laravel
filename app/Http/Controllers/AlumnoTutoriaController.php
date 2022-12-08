<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarAlumnoTutoriaRequest;
use App\Http\Requests\GuardarAlumnoTutoriaRequest;
use App\Models\AlumnosEnTutorias;
use Illuminate\Http\Request;

class AlumnoTutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AlumnosEnTutorias = AlumnosEnTutorias::with('tutoria')->with('alumno')->get();

        return response([
            'status'    => true,
            'AlumnosEnTutorias' => $AlumnosEnTutorias
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
    public function store(GuardarAlumnoTutoriaRequest $request)
    {
        $data = $request->all();

        $alumno_tutoria = AlumnosEnTutorias::create([
            'alumno_id'         => $data['alumno_id'],
            'tutoria_id'         => $data['tutoria_id'],
        ]);

        if($alumno_tutoria){
            return response([
                'status'   => true,
                'alumno_tutoria' => $alumno_tutoria,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar al alumno_tutoria'
            ],403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AlumnosEnTutorias $alumno_tutoria)
    {
        $alumno_tutoria = AlumnosEnTutorias::where('id', $alumno_tutoria->id)->with('tutoria')->with('alumno')->get();

        if($alumno_tutoria){
            return response([
                'status'   => true,
                'alumno_tutoria'   => $alumno_tutoria
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información del alumno_tutoria'
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
    public function update(ActualizarAlumnoTutoriaRequest $request, AlumnosEnTutorias $alumno_tutoria)
    {
        if($alumno_tutoria){
            $data = $request->all();
          
            $alumno_tutoria->alumno_id         = $data['alumno_id'];
            $alumno_tutoria->tutoria_id         = $data['tutoria_id'];

            if($alumno_tutoria->save()){
                return response([
                    'status'   => true,
                    'alumno_tutoria' => $alumno_tutoria,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar el alumno_tutoria'
                ]);
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
    public function destroy(AlumnosEnTutorias $alumno_tutoria)
    {
        if($alumno_tutoria->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado al alumno_tutoria"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar al alumno_tutoria"
            ]);
        }
    }
}
