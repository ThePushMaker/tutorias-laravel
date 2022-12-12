<?php

namespace App\Http\Controllers;

use App\Http\Requests\IniciarSesionRequest;
use App\Models\Alumnos;
use App\Models\Maestros;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function iniciar_sesion(IniciarSesionRequest $request)
    {

        $data = $request->all();

        $maestro = Maestros::where('correo', $data['correo'])->where('contraseña', $data['contraseña'])->get()->first();
        $alumno = Alumnos::where('correo', $data['correo'])->where('contraseña', $data['contraseña'])->get()->first();

        if ($alumno != null) {
            return response([
                'status'   => true,
                'msg'   => 'Iniciando sesión...',
                'tipo_cuenta'  => $alumno->tipo_cuenta,
                'usuario'  => $alumno,
                // 'data'  => $data
            ]);
        } else if ($maestro != null) {
            return response([
                'status'   => true,
                'msg'   => 'Iniciando sesión...',
                'tipo_cuenta'   => 'profesor',
                'usuario'  => $maestro,
                // 'data'  => $data
            ]);
        } else {
            return response([
                'status' => false,
                'msg'   => 'Datos incorrectos',
            ], 401);
        }
    }


    public function registro()
    {
        return view('vistas.registro');
    }
    public function inicio_sesion()
    {
        return view('vistas.inicio_sesion');
    }

    // dashboard profesores
    public function profesoresInicio()
    {
        return view('vistas.profesores.solicitudes_list');
    }
    public function solicitudEditar()
    {
        return view('vistas.profesores.solicitudes_edit');
    }



    // dashboard alumnos
    public function alumnosInicio()
    {
        return view('vistas.alumnos.tutorias_list');
    }




    // dashboard tutores
    public function tutoresInicio()
    {
        return view('vistas.tutores.inicio');
    }

    // api calendar
    public function calendarApi()
    {
        return view('calendar-api');
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
