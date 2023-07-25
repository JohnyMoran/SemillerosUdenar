<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EventoProyecto;
use App\Models\Evento;
use App\Models\Proyecto;

class EventoProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vinculaciones = EventoProyecto::with('evento', 'proyecto')->get();
    
        // Agrupar las vinculaciones por evento
        $eventosConProyectos = [];
        foreach ($vinculaciones as $eventoProyecto) {
            $eventoId = $eventoProyecto->evento->id;
            $eventosConProyectos[$eventoId]['evento'] = $eventoProyecto->evento;
            $eventosConProyectos[$eventoId]['proyectos'][] = $eventoProyecto->proyecto;
        }
    
        return view('admin.eventoproyecto.index', compact('eventosConProyectos'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los eventos que no tienen proyectos vinculados
        $eventosSinProyectos = Evento::has('proyectos', '<', 1)->pluck('nombre', 'id');
    
        // Obtener todos los proyectos
        $proyectos = Proyecto::all();
    
        // Cambio aquí: Usar "título" en lugar de "nombre" para los proyectos
        $proyectosNombres = $proyectos->pluck('titulo', 'id');
    
        return view('admin.eventoproyecto.create', compact('eventosSinProyectos', 'proyectosNombres', 'proyectos'));
    }
 

    public function store(Request $request)
    {
       
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'proyectos' => 'required|array',
            'proyectos.*' => 'exists:proyectos,id',
        ]);
        
        // Obtener el evento seleccionado
        $evento = Evento::findOrFail($request->evento_id);
    
        // Asignar los proyectos al evento
        $evento->proyectos()->sync($request->proyectos);
    
        return redirect()->route('admin.eventoproyecto.index')->with('success', 'Proyectos asignados correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(eventoproyecto $eventoproyecto)
    {
        //
        return view('admin.eventoproyecto.edit', compact('eventoproyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, eventoproyecto $eventoproyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $eventoProyecto = EventoProyecto::findOrFail($id);
        
        // Eliminar la vinculación del evento con los proyectos
        $eventoProyecto->proyectos()->detach();
        
        // Eliminar el registro de la tabla evento_proyecto
        $eventoProyecto->delete();
        
        return redirect()->route('admin.eventoproyecto.index')
            ->with('success', 'La vinculación de evento y proyectos ha sido eliminada exitosamente.');
    }
    
    
    
}
