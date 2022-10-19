<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MaestroController;
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

// Route::resource('/alumnos', AlumnoController::class);
Route::get('alumnos',[AlumnoController::class,'index']);
Route::post('alumnos',[AlumnoController::class,'store']);
Route::get('alumnos/{alumno}',[AlumnoController::class,'show']);
Route::put('alumnos/{alumno}',[AlumnoController::class,'update']);
Route::delete('alumnos/{alumno}',[AlumnoController::class,'destroy']);

Route::get('maestros',[MaestroController::class,'index']);
Route::post('maestros',[MaestroController::class,'store']);
// Route::get('/students', [AlumnoController::class, 'list']);




