<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SemillerosController;
use App\Http\Controllers\Admin\ProyectosController;
use App\Http\Controllers\Admin\EventosController;
use App\Http\Controllers\Admin\CoordinadoresController;
use App\Http\Controllers\Admin\SemilleroCoordinadorController;
use App\Http\Controllers\Admin\ParticipacionesController;
use App\Http\Controllers\Admin\EventoProyectoController;
use App\Http\Controllers\Admin\SemilleristasController;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Evento;
use App\Models\Semillero;
use App\Models\Semillerista;
use App\Models\Coordinador;
use App\Models\Proyecto;
use App\Models\Participacion;

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

Route::get('/generate-eventos-pdf', function () {
    $eventos = Evento::all();
    $pdf = new Dompdf();
    $html = View::make('admin.reports.eventos_pdf', compact('eventos'))->render();
    $pdf->loadHtml($html);
    $pdf->render();
    return $pdf->stream('reporte_eventos.pdf');
})->name('admin.reports.eventos_pdf');

Route::get('/generate-semilleros-pdf', function () {
    $semilleros = Semillero::all();
    $pdf = new Dompdf();
    $html = View::make('admin.reports.semilleros_pdf', compact('semilleros'))->render();
    $pdf->loadHtml($html);
    $pdf->render();
    return $pdf->stream('reporte_semilleros.pdf');
})->name('admin.reports.semilleros_pdf');

Route::get('/generate-semilleristas-pdf', function () {
    $semilleristas = Semillerista::all();
    $pdf = new Dompdf();
    $html = View::make('admin.reports.semilleristas_pdf', compact('semilleristas'))->render();
    $pdf->loadHtml($html);
    $pdf->render();
    return $pdf->stream('reporte_semilleristas.pdf');
})->name('admin.reports.semilleristas_pdf');

Route::get('/generate-coordinadores-pdf', function () {
    $coordinadores = Coordinador::all();
    $pdf = new Dompdf();
    $html = View::make('admin.reports.coordinadores_pdf', compact('coordinadores'))->render();
    $pdf->loadHtml($html);
    $pdf->render();
    return $pdf->stream('reporte_coordinadores.pdf');
})->name('admin.reports.coordinadores_pdf');

Route::get('/generate-proyectos-pdf', function () {
    $proyectos = Proyecto::all();
    $pdf = new Dompdf();
    $html = View::make('admin.reports.proyectos_pdf', compact('proyectos'))->render();
    $pdf->loadHtml($html);
    $pdf->render();
    return $pdf->stream('reporte_proyectos.pdf');
})->name('admin.reports.proyectos_pdf');

Route::get('/generate-participaciones-pdf', function () {
    $participaciones = Participacion::all();
    $pdf = new Dompdf();
    $html = View::make('admin.reports.participaciones_pdf', compact('participaciones'))->render();
    $pdf->loadHtml($html);
    $pdf->render();
    return $pdf->stream('reporte_participaciones.pdf');
})->name('admin.reports.participaciones_pdf');
