<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /* Alumnos */
Route::get('alumno/crear', [SucursalController::class, 'alumnoCrear'])->name('alumno-crear');
Route::get('alumnos', [AlumnoController::class, 'alumnosList'])->name('alumnos-list');
Route::get('alumno/{alumno}', [AlumnoController::class, 'showOne'])->name('alumno');
Route::get('alumno/{alumno}/editar', [AlumnoController::class, 'alumnoUpdate'])->name('alumno-update');
