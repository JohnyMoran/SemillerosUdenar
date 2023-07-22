<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SemilleroCoordinador;
use App\Models\Semillero;
use App\Models\Coordinador;



class SemilleroCoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asignaciones = SemilleroCoordinador::with('semillero', 'coordinador')->get();
        return view('admin.semillerocoordinador.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $semilleros = Semillero::pluck('nombre', 'id');
        $coordinadores = Coordinador::pluck('nombre', 'id');
        
        return view('admin.semillerocoordinador.create', compact('semilleros', 'coordinadores'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'semillero_id' => 'required',
            'coordinador_id' => 'required',
        ]);
        
    
        // Verificar si ya existe una asignación para el semillero
        $existingAssignment = SemilleroCoordinador::where([
            'semillero_id' => $request->semillero_id,
        ])->first();

    
        if ($existingAssignment) {
            return redirect()->route('admin.semillerocoordinador.create')
                ->with('error', 'El semillero ya tiene asignado un coordinador.');
        }
    
        // Crear la nueva asignación
        SemilleroCoordinador::create([
            'semillero_id' => $request->semillero_id,
            'coordinador_id' => $request->coordinador_id,
        ]);
    
        return redirect()->route('admin.semillerocoordinador.index')
            ->with('success', 'La asignación se ha creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(semillerocoordinador $semillerocoordinador)
    {
        //
        return view('admin.semillerocoordinador.show', compact('semillerocoordinador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semillerocoordinador $semillerocoordinador)
    {
        //
        return view('admin.semillerocoordinador.edit', compact('semillerocoordinador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, semillerocoordinador $semillerocoordinador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(semillerocoordinador $semillerocoordinador)
    {
        try {
            // Agregar mensaje de depuración
            //dd('Entrando en el método destroy', $semilleroCoordinador);
    
            $semillerocoordinador->delete();
    
            return redirect()->route('admin.semillerocoordinador.index')
                ->with('info', 'La asignación se eliminó con éxito.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema al eliminar la asignación: ' . $e->getMessage());
        }  
    }
    
}
