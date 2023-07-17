<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $eventos = Evento::all();
        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());

        $request->validate([
            'codigo' => 'required|unique:eventos',
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'lugar' => 'required',
            'tipo' => 'required',
            'modalidad' => 'required',
            'clasificacion' => 'required',
            'observaciones' => 'nullable',
        ]);
    
        $evento = new Evento();
        $evento->codigo = $request->codigo;
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->lugar = $request->lugar;
        $evento->tipo = $request->tipo;
        $evento->modalidad = $request->modalidad;
        $evento->clasificacion = $request->clasificacion;
        $evento->observaciones = $request->observaciones;
    
        // Subir archivo (si es necesario)
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('archivos_evento', 'public');
            $evento->archivo = $rutaArchivo;
        }
    
        $evento->save();
    
        return redirect()->route('admin.eventos.index')
            ->with('success', 'El evento se ha creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
        return view('admin.eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
        return view('admin.eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
        $evento->delete();

        return redirect()->route('admin.eventos.index')
        ->with('info', 'El evento se eliminó con éxito');;
    }
}
