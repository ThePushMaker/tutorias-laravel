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
        $AlumnosEnTutorias = AlumnosEnTutorias::get();

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

        $alumnoEnTutoria = AlumnosEnTutorias::create([
            'alumno_id'         => $data['alumno_id'],
            'tutoria_id'         => $data['tutoria_id'],
        ]);

        if($alumnoEnTutoria){
            return response([
                'status'   => true,
                'alumnoEnTutoria' => $alumnoEnTutoria,
            ]);
        }else{
            return response([
                'status' => false,
                'msg'    => 'Ocurrio un error al intentar guardar al alumnoEnTutoria'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AlumnosEnTutorias $alumnoEnTutoria)
    {
        $alumnoEnTutoria = AlumnosEnTutorias::where('id', $alumnoEnTutoria->id)->get();

        if($alumnoEnTutoria){
            return response([
                'status'   => true,
                'alumnoEnTutoria'   => $alumnoEnTutoria
            ]);
        }else{
            return response([
                'status'=> true,
                'msg'   => 'No se pudo encontrar la información del alumnoEnTutoria'
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
    public function update(ActualizarAlumnoTutoriaRequest $request, AlumnosEnTutorias $alumnoEnTutoria)
    {
        if($alumnoEnTutoria){
            $data = $request->all();
          
            $alumnoEnTutoria->alumno_id         = $data['alumno_id'];
            $alumnoEnTutoria->tutoria_id         = $data['tutoria_id'];

            if($alumnoEnTutoria->save()){
                return response([
                    'status'   => true,
                    'alumnoEnTutoria' => $alumnoEnTutoria,
                ]);
            }else{
                return response([
                    'status' => false,
                    'msg'    => 'Ocurrio un error al intentar actualizar el alumnoEnTutoria'
                ]);
            }
        }else{
            return response([
                'status' => false,
                'msg'    => 'No se pudo obtener la información del alumnoEnTutoria'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumnosEnTutorias $alumnoEnTutoria)
    {
        if($alumnoEnTutoria->delete()){
            return response([
                'status'=> true,
                'msg'   => "Se ha eliminado al alumnoEnTutoria"
            ]);
        }else{
            return response([
                'status'=> false,
                'msg'   => "No fue posible eliminar al alumnoEnTutoria"
            ]);
        }
    }
}
