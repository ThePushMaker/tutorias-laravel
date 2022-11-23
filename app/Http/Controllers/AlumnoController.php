<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarAlumnoRequest;
use App\Http\Requests\GuardarAlumnoRequest;
use App\Models\Alumnos;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    public function alumnosList(){
        return view('alumno-list');
    }
    public function alumnoUpdate(Alumnos $alumno){
        return view('alumno-update', compact('alumno'));
    }
    public function showOne(Alumnos $alumno){
        return view('alumno-detalle', compact('alumno'));
    }
    public function alumnoCrear(){
        return view('alumno-crear');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumnos::get();

        return response([
            'status'    => true,
            'alumnos' => $alumnos
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
    public function store(GuardarAlumnoRequest $request)
    {
        Alumnos::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=> "Alumno guardado correctamente"
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumno)
    {
        return response()->json([
            'res'=>true,
            'alumno'=>$alumno
        ],200);
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
    public function update(ActualizarAlumnoRequest $request, Alumnos $alumno)
    {
        $alumno->update($request->all());
        return response()->json([
            'res'=>true,
            'mensaje'=>'alumno actualizado correctamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumnos $alumno)
    {
        $alumno->delete();
        return response()->json([
            'res'=>true,
            'mensaje'=>'paciente eliminado correctamente'
        ],200);
    }
}
