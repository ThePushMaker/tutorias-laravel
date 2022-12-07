<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function registro(){
        return view('vistas.registro');
    }
    public function inicio_sesion(){
        return view('vistas.inicio_sesion');
    }

    // dashboard profesores
    public function profesoresInicio(){
        return view('vistas.profesores.solicitudes_list');
    }
    public function solicitudEditar(){
        return view('vistas.profesores.solicitudes_edit');
    }

    

    // dashboard alumnos
    public function alumnosInicio(){
        return view('vistas.alumnos.tutorias_list');
    }




    // dashboard tutores
    public function tutoresInicio(){
        return view('vistas.tutores.inicio');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
