<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SolicitudTutoriaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vistas.home');
});
// Route::get('/inicio_sesion', function () {
//     return view('inicio_sesion');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inicio_sesion', [App\Http\Controllers\HomeController::class, 'inicio_sesion']);;
Route::get('/registro', [App\Http\Controllers\HomeController::class, 'registro']);

// calendar api
Route::get('/calendar_api', [App\Http\Controllers\HomeController::class, 'calendarApi']);

// Dashboard Profesores
// Solicitudes tutorias
Route::get('/profesores', [HomeController::class, 'profesoresInicio']);
Route::get('/profesores/solicitudes/{solicitud}/editar', [HomeController::class, 'solicitudEditar']);
// Route::get('profesores/solicitudes/{solicitud}', [SolicitudTutoriaController::class, 'solicitudMostrar']);

// Dashboard alumnos
Route::get('/alumnos', [HomeController::class, 'alumnosInicio']);

// Dashboard tutores
Route::get('/tutores', [HomeController::class, 'tutoresInicio']);




//     /* Alumnos */
// Route::get('alumno/crear', [AlumnoController::class, 'alumnoCrear'])->name('alumno-crear');
// Route::get('alumnos', [AlumnoController::class, 'alumnosList'])->name('alumnos-list');
// Route::get('alumno/{alumno}', [AlumnoController::class, 'showOne'])->name('alumno');
// Route::get('alumno/{alumno}/editar', [AlumnoController::class, 'alumnoUpdate'])->name('alumno-update');

// //Maestros
// Route::get('profesores/crear', [MaestroController::class, 'maestroCrear'])->name('maestro-crear');
// // Route::get('profesores', [MaestroController::class, 'maestrosHome'])->name('profesores_home');
// // Route::get('profesores', [MaestroController::class, 'maestrosList'])->name('maestros-list');
// Route::get('profesores/{maestro}', [MaestroController::class, 'showOne'])->name('maestro');
// Route::get('profesores/{maestro}/editar', [MaestroController::class, 'maestroUpdate'])->name('maestro-update');
