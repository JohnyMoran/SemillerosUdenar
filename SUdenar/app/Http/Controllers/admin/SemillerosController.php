<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Semillero;

class SemillerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semilleros = Semillero::all();
        return view('admin.semilleros.index', compact('semilleros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.semilleros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:semilleros',
            'correo' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'valores' => 'required',
            'objetivos' => 'required',
            'lineas_investigacion' => 'required',
            'archivo_presentacion' => 'required|file|mimes:pdf',
            'numero_resolucion_creacion' => 'required',
            'fecha_resolucion_creacion' => 'required|date',
            'archivo_resolucion_creacion' => 'required|file|mimes:pdf',
        ], 
        [
            'nombre.unique' => 'Ya existe un semillero con este nombre.',
        ]);

        // Subir archivo de logo
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = $logoFile->store('logos', 'public');
        } else {
            $logoPath = null;
        }
               

        // Subir archivo de presentación
        if ($request->hasFile('archivo_presentacion')) {
            $archivoPresentacion = $request->file('archivo_presentacion');
            $rutaArchivop = $archivoPresentacion->store('archivos_presentacion', 'public');
        }

        // Subir archivo de resolucion
        if ($request->hasFile('archivo_resolucion_creacion')) {
            $archivoResolucion = $request->file('archivo_resolucion_creacion');
            $rutaArchivor = $archivoResolucion->store('archivo_resolucion_creacion', 'public');
        }

        $semillero = Semillero::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'logo' => $logoPath, 
            'descripcion' => $request->descripcion,
            'mision' => $request->mision,
            'vision' => $request->vision,
            'valores' => $request->valores,
            'objetivos' => $request->objetivos,
            'lineas_investigacion' => $request->lineas_investigacion,
            'archivo_presentacion' => $rutaArchivop,
            'numero_resolucion_creacion' => $request->numero_resolucion_creacion,
            'fecha_resolucion_creacion' => $request->fecha_resolucion_creacion,
            'archivo_resolucion_creacion' => $rutaArchivor,
            
        ]);

        return redirect()->route('admin.semilleros.index')
            ->with('success', 'El semillero se ha creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semillero $semillero)
    {
        return view('admin.semilleros.show', compact('semillero'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semillero $semillero)
    {
        return view('admin.semilleros.edit', compact('semillero'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semillero $semillero)
    {
        $request->validate([
            'nombre' => 'required|unique:semilleros,nombre,' . $semillero->id,
            'correo' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'valores' => 'required',
            'objetivos' => 'required',
            'lineas_investigacion' => 'required',
            'archivo_presentacion' => 'file|mimes:pdf',
            'numero_resolucion_creacion' => 'required',
            'fecha_resolucion_creacion' => 'required|date',
            'archivo_resolucion_creacion' => 'file|mimes:pdf',
        ],
        [
            'nombre.unique' => 'Ya existe un semillero con este nombre.',
        ]);

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = $logoFile->store('logos', 'public');
        } else {
            $logoPath = $semillero->logo;
        }

        if ($request->hasFile('archivo_presentacion')) {
            $archivoPresentacion = $request->file('archivo_presentacion');
            $rutaArchivop = $archivoPresentacion->store('archivos_presentacion', 'public');
        } else {
            $rutaArchivop = $semillero->archivo_presentacion;
        }

        if ($request->hasFile('archivo_resolucion_creacion')) {
            $archivoResolucion = $request->file('archivo_resolucion_creacion');
            $rutaArchivor = $archivoResolucion->store('archivo_resolucion_creacion', 'public');
        } else {
            $rutaArchivor = $semillero->archivo_resolucion_creacion;
        }

        $semillero->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'logo' => $logoPath,
            'descripcion' => $request->descripcion,
            'mision' => $request->mision,
            'vision' => $request->vision,
            'valores' => $request->valores,
            'objetivos' => $request->objetivos,
            'lineas_investigacion' => $request->lineas_investigacion,
            'archivo_presentacion' => $rutaArchivop,
            'numero_resolucion_creacion' => $request->numero_resolucion_creacion,
            'fecha_resolucion_creacion' => $request->fecha_resolucion_creacion,
            'archivo_resolucion_creacion' => $rutaArchivor,
        ]);

        return redirect()->route('admin.semilleros.index')
            ->with('success', 'El semillero se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semillero $semillero)
    {
        $semillero->delete();

        return redirect()->route('admin.semilleros.index')
        ->with('info', 'El semillero se eliminó con éxito');;
    }

    public function semilleristas($id)
    {
        $semillero = Semillero::findOrFail($id);
        $semilleristas = $semillero->semilleristas;

        return view('admin.semilleros.semilleristas', compact('semilleristas'));
    }

}
