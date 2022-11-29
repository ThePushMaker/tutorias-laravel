<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoTutoriaController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\SolicitudTutoriaController;
use App\Http\Controllers\TutoriaController;
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

// Alumnos
Route::get('alumnos',[AlumnoController::class,'index']);
Route::post('alumnos',[AlumnoController::class,'store']);
Route::get('alumnos/{alumno}',[AlumnoController::class,'show']);
Route::put('alumnos/{alumno}',[AlumnoController::class,'update']);
Route::delete('alumnos/{alumno}',[AlumnoController::class,'destroy']);

// Maestros
Route::get('maestros',[MaestroController::class,'index']);
Route::post('maestros',[MaestroController::class,'store']);
Route::get('maestros/{maestro}',[MaestroController::class,'show']);
Route::put('maestros/{maestro}',[MaestroController::class,'update']);
Route::delete('maestros/{maestro}',[MaestroController::class,'destroy']);

// Materias -
Route::get('materias',[MateriaController::class,'index']);
Route::post('materias',[MateriaController::class,'store']);
Route::get('materias/{materia}',[MateriaController::class,'show']);
Route::put('materias/{materia}',[MateriaController::class,'update']);
Route::delete('materias/{materia}',[MateriaController::class,'destroy']);

// Solicitudes tutorias -
Route::get('solicitudes_tutorias',[SolicitudTutoriaController::class,'index']);
Route::post('solicitudes_tutorias',[SolicitudTutoriaController::class,'store']);
Route::get('solicitudes_tutorias/{solicitud}',[SolicitudTutoriaController::class,'show']);
Route::put('solicitudes_tutorias/{solicitud}',[SolicitudTutoriaController::class,'update']);
Route::delete('solicitudes_tutorias/{solicitud}',[SolicitudTutoriaController::class,'destroy']);

// Tutorias disponibles -
Route::get('tutorias',[TutoriaController::class,'index']);
Route::post('tutorias',[TutoriaController::class,'store']);
Route::get('tutorias/{tutoria}',[TutoriaController::class,'show']);
Route::put('tutorias/{tutoria}',[TutoriaController::class,'update']);
Route::delete('tutorias/{tutorias}',[TutoriaController::class,'destroy']);

//Alumnos en tutorias -
Route::get('alumnos_tutorias',[AlumnoTutoriaController::class,'index']);
Route::post('alumnos_tutorias',[AlumnoTutoriaController::class,'store']);
Route::get('alumnos_tutorias/{id}',[AlumnoTutoriaController::class,'show']);
Route::put('alumnos_tutorias/{id}',[AlumnoTutoriaController::class,'update']);
Route::delete('alumnos_tutorias/{id}',[AlumnoTutoriaController::class,'destroy']);

//Sesiones |||
Route::get('sesiones',[SesionController::class,'index']);
Route::post('sesiones',[SesionController::class,'store']);
Route::get('sesiones/{sesion}',[SesionController::class,'show']);
Route::put('sesiones/{sesion}',[SesionController::class,'update']);
Route::delete('sesiones/{sesion}',[SesionController::class,'destroy']);