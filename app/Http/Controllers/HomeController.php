<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function registro(){
        return view('registro');
    }
    public function inicio_sesion(){
        return view('inicio_sesion');
    }

    // dashboard profesores
    public function profesoresInicio(){
        return view('profesores.solicitudes.list');
    }
    public function solicitudEditar(){
        return view('profesores.solicitudes.edit');
    }

    

    // dashboard alumnos
    public function alumnosInicio(){
        return view('alumnos.inicio');
    }




    // dashboard tutores
    public function tutoresInicio(){
        return view('tutores.inicio');
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
