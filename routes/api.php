<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoTutoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriaMaestroController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\SolicitudTutoriaController;
use App\Http\Controllers\TutoriaController;
use App\Http\Controllers\TutorMateriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Iniciar sesión
Route::post('inicio_sesion', [HomeController::class, 'iniciar_sesion']);

// Registro
Route::post('alumnos', [AlumnoController::class, 'store']);

// Alumnos
Route::get('alumnos', [AlumnoController::class, 'index']);
Route::get('alumnos/{alumno}', [AlumnoController::class, 'show']);
Route::put('alumnos/{alumno}', [AlumnoController::class, 'update']);
Route::delete('alumnos/{alumno}', [AlumnoController::class, 'destroy']);
// Actualizar tipo de cuenta de "alumno" a "tutor"
Route::put('alumnos/tutor/{alumno}', [AlumnoController::class, 'updateAccountType']);

// Maestros
Route::get('maestros', [MaestroController::class, 'index']);
Route::post('maestros', [MaestroController::class, 'store']);
Route::get('maestros/{maestro}', [MaestroController::class, 'show']);
Route::put('maestros/{maestro}', [MaestroController::class, 'update']);
Route::delete('maestros/{maestro}', [MaestroController::class, 'destroy']);

// Materias 
Route::get('materias/{user_id}', [MateriaController::class, 'index']);
Route::post('materias', [MateriaController::class, 'store']);
Route::get('materias/{materia}', [MateriaController::class, 'show']);
Route::put('materias/{materia}', [MateriaController::class, 'update']);
Route::delete('materias/{materia}', [MateriaController::class, 'destroy']);

// Materias_mestros
Route::get('materias_maestros', [MateriaMaestroController::class, 'index']);
Route::get('materias_maestros/{materia_maestro}', [MateriaMaestroController::class, 'show']);

// Solicitudes tutorias 
Route::get('solicitudes_tutorias', [SolicitudTutoriaController::class, 'index']);
Route::post('solicitudes_tutorias', [SolicitudTutoriaController::class, 'store']);
Route::get('solicitudes_tutorias/{solicitud_tutoria}', [SolicitudTutoriaController::class, 'show']);
Route::put('solicitudes_tutorias/{solicitud_tutoria}', [SolicitudTutoriaController::class, 'update']);
Route::delete('solicitudes_tutorias/{solicitud_tutoria}', [SolicitudTutoriaController::class, 'destroy']);

// Tutorias disponibles 
Route::get('tutorias', [TutoriaController::class, 'index']);
Route::post('tutorias', [TutoriaController::class, 'store']);
Route::get('tutorias/{tutoria}', [TutoriaController::class, 'show']);
Route::put('tutorias/{tutoria}', [TutoriaController::class, 'update']);
Route::delete('tutorias/{tutoria}', [TutoriaController::class, 'destroy']);

//Alumnos en tutorias
Route::get('alumnos_tutorias/{tutoria_id}', [AlumnoTutoriaController::class, 'index']);
Route::post('alumnos_tutorias', [AlumnoTutoriaController::class, 'store']);
Route::get('alumnos_tutorias/{alumno_tutoria}', [AlumnoTutoriaController::class, 'show']);
Route::put('alumnos_tutorias/{alumno_tutoria}', [AlumnoTutoriaController::class, 'update']);
Route::delete('alumnos_tutorias/{alumno_tutoria}', [AlumnoTutoriaController::class, 'destroy']);

//Tutores Materias
Route::get('tutores_materias', [TutorMateriaController::class, 'index']);
Route::post('tutores_materias', [TutorMateriaController::class, 'store']);
Route::get('tutores_materias/{tutor_materia}', [TutorMateriaController::class, 'show']);
Route::put('tutores_materias/{tutor_materia}', [TutorMateriaController::class, 'update']);
Route::delete('tutores_materias/{tutor_materia}', [TutorMateriaController::class, 'destroy']);

// Obtener las materias (aprobadas) de un tutor :para crear tutoria nueva función
Route::get('tutores_materias_disponibles/{tutor_id}', [TutorMateriaController::class, 'getMateriasDisponibles']);

// Obtener los alumnos inscritos a una tutoria :para 'mis tutorias' vista
Route::get('alumnos_inscritos/{tutoria_id}', [AlumnoTutoriaController::class, 'getAlumnosTutoria']);

//obtener todas las tutorias donde un alumno está inscrito :para 'tutorias asignadas' vista
Route::get('tutorias_inscritos/{alumno_id}', [AlumnoTutoriaController::class, 'getTutoriasAlumno']);

//obtener todas las solicitudes de tutorias aceptadas de un tutor
Route::get('solicitudes_aceptadas/{tutor_id}', [SolicitudTutoriaController::class, 'getSolicitudesAceptadas']);

//obtener todas las tutorias que imparte  un tutor (que el ha creado) :para mis tutorias vista
Route::get('tutorias_creadas/{tutor_id}', [TutoriaController::class, 'getTutoriasCreadas']);
