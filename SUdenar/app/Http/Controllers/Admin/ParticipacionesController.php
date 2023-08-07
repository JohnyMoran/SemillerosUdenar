<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Participacion;
use App\Models\Evento;
use App\Models\Proyecto;
use App\Models\Semillero;
use App\Models\Semillerista;

class ParticipacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $participaciones = Participacion::all();
        return view('admin.participaciones.index', compact('participaciones'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eventos = Evento::pluck('nombre', 'id'); // Obtener todos los eventos para el select
        $proyectos = Proyecto::pluck('titulo', 'id'); // Obtener todos los proyectos para el select
        $semilleros = Semillero::pluck('nombre', 'id'); // Obtener todos los semilleros para el select
        $semilleristas = Semillerista::pluck('nombre', 'id'); // Obtener todos los semilleristas para el select

        return view('admin.participaciones.create', compact('eventos', 'proyectos', 'semilleros', 'semilleristas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required',
            'proyecto_id' => 'required',
            'semillero_id' => 'required',
            'semillerista_id' => 'required',
            'tipo_participacion' => 'required',
            'calificacion' => 'nullable|integer|min:0|max:100',
            'archivo_certificacion' => 'nullable|mimes:pdf|max:2048',
            'evidencias.*' => 'nullable|mimes:jpeg,png,pdf,zip|max:2048',
        ]);
    
        // Subir archivo de certificación (si es necesario)
        $rutaArchivoCertificacion = null;
        if ($request->hasFile('archivo_certificacion')) {
            $archivoCertificacion = $request->file('archivo_certificacion');
            $rutaArchivoCertificacion = $archivoCertificacion->store('archivos_certificacion', 'public');
        }
    
        // Subir evidencias (si es necesario)
        $evidenciasPath = [];
        if ($request->hasFile('evidencias')) {
            $evidencias = $request->file('evidencias');
    
            foreach ($evidencias as $evidencia) {
                $evidenciaPath = $evidencia->store('evidencias', 'public');
                $evidenciasPath[] = $evidenciaPath;
            }
        }
    
        // Crear nueva participación
        $participacion = Participacion::create([
            'evento_id' => $request->evento_id,
            'proyecto_id' => $request->proyecto_id,
            'semillero_id' => $request->semillero_id,
            'semillerista_id' => $request->semillerista_id,
            'tipo_participacion' => $request->tipo_participacion,
            'calificacion' => $request->calificacion,
            'archivo_certificacion' => $rutaArchivoCertificacion,
            'evidencias' => json_encode($evidenciasPath), // Almacena las rutas en formato JSON
    
        ]);
    
        return redirect()->route('admin.participaciones.index')
            ->with('success', 'La participación se ha asignado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participacion $participacione)
    {
        //
        return view('admin.participaciones.show', compact('participaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participacion $participacione)
    {
        //
        return view('admin.participaciones.edit', compact('participaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participacion $participacione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participacion $participacione)
    {
        //
    }
}
