<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coordinador;

class CoordinadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $coordinadores = Coordinador::all();
        return view('admin.coordinadores.index', compact('coordinadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.coordinadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'nombre' => 'required|unique:coordinadores',
            'identificacion' => 'required|unique:coordinadores',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date',
            'programa_academico' => 'required',
            'areas_conocimiento' => 'required',
            'fecha_vinculacion' => 'required|date',
            'acuerdo_nombramiento' => 'required|file|mimes:pdf',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'nombre.unique' => 'Ya existe un usuario con este nombre.',
            'identificacion.unique' => 'Ya existe usuario con esta identificación.',
        ]);
        
    
        $coordinador = new Coordinador([
            'nombre' => $request->get('nombre'),
            'identificacion' => $request->get('identificacion'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'correo' => $request->get('correo'),
            'genero' => $request->get('genero'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'programa_academico' => $request->get('programa_academico'),
            'areas_conocimiento' => $request->get('areas_conocimiento'),
            'fecha_vinculacion' => $request->get('fecha_vinculacion'),
        ]);
        //dd($request->all());
    
        // Subir archivo de acuerdo de nombramiento
        $acuerdoNombramientoPath = $request->file('acuerdo_nombramiento')->store('acuerdos', 'public');
        $coordinador->acuerdo_nombramiento = $acuerdoNombramientoPath;
    
        // Subir archivo de foto
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
            $coordinador->foto = $fotoPath;
        }
    
        $coordinador->save();
    
        return redirect()->route('admin.coordinadores.index')->with('success', 'Coordinador creado exitosamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Coordinador $coordinadore)
    {
        //
        return view('admin.coordinadores.show', compact('coordinadores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinador $coordinadore)
    {
        //
        return view('admin.coordinadores.edit', compact('coordinadores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordinador $coordinadore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinador $coordinadore)
    {
        //
    }

    public function generateCoordinadoresPDF()
    {
        $coordinadores = Coordinador::all();
        $pdf = new Dompdf();
        $pdf->loadView('admin.reports.coordinadores_pdf', compact('coordinadores'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('reporte_coordinadores.pdf');
    }
}
