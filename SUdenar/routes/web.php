<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SemillerosController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', [HomeController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('semilleros', SemillerosController::class)->names('admin.semilleros');

Route::resource('semilleristas', SemilleristasController::class)->names('admin.semilleristas');

Route::resource('proyectos', ProyectosController::class)->names('admin.proyectos');

Route::resource('eventos', EventosController::class)->names('admin.eventos');

Route::resource('coordinadores', CoordinadoresController::class)->names('admin.coordinadores');

Route::resource('semillerocoordinador', SemilleroCoordinadorController::class)->names('admin.semillerocoordinador');

Route::resource('eventoproyecto', EventoProyectoController::class)->names('admin.eventoproyecto');

Route::resource('participaciones', ParticipacionesController::class)->names('admin.participaciones');

Route::get('/admin/semilleros/{id}/semilleristas')->name('admin.semilleros.semilleristas');
