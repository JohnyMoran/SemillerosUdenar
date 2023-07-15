<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semillero;
use App\Models\Proyecto;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $proyectos = Proyecto::all();
        return view('admin.proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semillero = Semillero::first();
    
        if (!$semillero) {
            return redirect()->route('admin.proyectos.index')->with('error', 'No hay semilleros disponibles.');
        }
    
        $semilleristas = $semillero->semilleristas->pluck('nombre', 'id');
        return view('admin.proyectos.create', compact('semilleristas', 'semillero'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'codigo' => 'required|unique:proyectos',
            'titulo' => 'required|unique:proyectos',
            'integrantes.*' => 'integer',
            'tipo_proyecto' => 'required|in:investigacion,innovacion,emprendimiento',
            'estado' => 'required|in:propuesta,en_curso,terminado',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date',
            'archivo_propuesta' => 'required|file|mimes:pdf',
            'archivo_proyecto_final' => 'file|mimes:pdf',
        ],
        [
            'codigo.unique' => 'Ya existe un proyecto con este código.',
            'titulo.unique' => 'Ya existe un proyecto con este título.',
        ]);
        

        // Obtener los IDs de los semilleristas seleccionados
        $integrantes = $request->input('integrantes');

        // Convertir el array de IDs en una cadena JSON
        $integrantesJson = json_encode($integrantes);


        // Subir archivo de propuesta
        if ($request->hasFile('archivo_propuesta')) {
            $archivoPropuesta = $request->file('archivo_propuesta');
            $rutaArchivoPropuesta = $archivoPropuesta->store('archivos_propuesta', 'public');
        }
    
        $rutaArchivoProyectoFinal = null;

        // Subir archivo de proyecto final
        if ($request->hasFile('archivo_proyecto_final')) {
            $archivoProyectoFinal = $request->file('archivo_proyecto_final');
            $rutaArchivoProyectoFinal = $archivoProyectoFinal->store('archivos_proyecto_final', 'public');
        }

        $proyecto = Proyecto::create([
            'codigo' => $request->codigo,
            'titulo' => $request->titulo,
            'integrantes' => $integrantesJson,
            'tipo_proyecto' => $request->tipo_proyecto,
            'estado' => $request->estado,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'archivo_propuesta' => $rutaArchivoPropuesta,
            'archivo_proyecto_final' => $rutaArchivoProyectoFinal,
        ]);

        //dd($request->all());

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'El proyecto se ha creado exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
        return view('admin.proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        //
        return view('admin.proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        //
        $proyecto->delete();

        return redirect()->route('admin.proyectos.index')
        ->with('info', 'El proyecto se eliminó con éxito');;
    }
}
