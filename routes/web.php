<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\DatosController;

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
    return view('layouts.template');
});
//ruta para el crud de la tabla personas
Route::resource("personas",PersonasController::Class);
//ruta para el crud de la tabla estado_civil
Route::resource("estadocivil",EstadoCivilController::Class);
//ruta para el crud de la tabla carreras
Route::resource("carreras",CarrerasController::Class);
//ruta para el crud de la tabla datos
Route::resource("datos",DatosController::Class);