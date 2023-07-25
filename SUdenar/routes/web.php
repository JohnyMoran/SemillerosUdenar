<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CoordinadoresController;
use App\Http\Controllers\Admin\SemilleroCoordinadorController;
use App\Http\Controllers\Admin\EventoProyectoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('coordinadores', CoordinadoresController::class)->names('admin.coordinadores');

Route::resource('semillerocoordinador', SemilleroCoordinadorController::class)->names('admin.semillerocoordinador');

Route::resource('eventoproyecto', EventoProyectoController::class)->names('admin.eventoproyecto');