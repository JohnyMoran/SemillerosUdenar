<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Semillerista;

class SemilleristasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $semilleristas = Semillerista::with('semilleros')->get();
        return view('admin.semilleristas.index', compact('semilleristas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.semilleristas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'identificacion' => 'required|string|unique:semilleristas|max:255',
            'codigo_estudiantil' => 'required|string|unique:semilleristas|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'correo' => 'required|string|max:255|email',
            'genero' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'semestre' => 'required|string|max:255',
            'programa_academico' => 'required|string|max:255',
            'fecha_vinculacion' => 'required|date',
            'estado' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'reporte_matricula' => 'required|mimes:pdf|max:2048',
            'semillero_id' => 'required|exists:semilleros,id',
        ],
        [
            'nombre.unique' => 'Ya existe un usuario con este nombre.',
            'identificacion.unique' => 'Ya existe usuario con esta identificación.',
            'codigo_estudiantil.unique' => 'Ya existe usuario con este código.',
        ]);
    
        $fotoPath = $request->file('foto')->store('semilleristas/fotos', 'public');
        $reporteMatriculaPath = $request->file('reporte_matricula')->store('semilleristas/reportes', 'public');
    
        $semillerista = new Semillerista([
            'nombre' => $request->nombre,
            'identificacion' => $request->identificacion,
            'codigo_estudiantil' => $request->codigo_estudiantil,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'semestre' => $request->semestre,
            'programa_academico' => $request->programa_academico,
            'semillero_id' => $request->semillero_id,
            'fecha_vinculacion' => $request->fecha_vinculacion,
            'estado' => $request->estado,
            'foto' => $fotoPath,
            'reporte_matricula' => $reporteMatriculaPath,
        ]);
    
        $semillerista->save();
    
        return redirect()->route('admin.semilleristas.index')->with('success', 'Semillerista agregado correctamente');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Semillerista $semillerista)
    {
        //
        return view('admin.semilleristas.show', compact('semilleristas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semillerista $semillerista)
    {
        //
        return view('admin.semilleristas.edit', compact('semilleristas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semillerista $semillerista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semillerista $semillerista)
    {
        //
        $semillerista->delete();

        return redirect()->route('admin.semilleristas.index')
        ->with('info', 'El estudainte se eliminó con éxito');;
    }

    public function generateSemilleristasPDF()
    {
        $semilleristas = Semillerista::all();
        $pdf = new Dompdf();
        $html = View::make('admin.reports.semilleristas_pdf', compact('semilleristas'))->render();
        $pdf->loadHtml($html);
        $pdf->render();
        $output = $pdf->output();
        
        $filePath = public_path('reports/reporte_semilleristas.pdf');
        file_put_contents($filePath, $output);
        
        return response()->download($filePath, 'reporte_semilleristas.pdf');
    }
}
