<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaCompra;
use App\Models\Planificador;
use App\Models\NotaFoto;


class Nota2Controller extends Controller
{
    public function __construct()
    {
        
    }

    // VISTA DE NOTAS DE COMPRAS
    public function vistaCompras()
    {
        $notas = NotaCompra::where('user_id', auth()->id())->get();
        return view('notas.compras', compact('notas'));
    }

    // GUARDAR NOTA DE COMPRAS
    public function guardarNotaCompras(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'checklist' => 'nullable|array',
        ]);

        NotaCompra::create([
            'user_id' => auth()->id(),
            'titulo' => $data['titulo'],
            'checklist' => json_encode($data['checklist'] ?? []),
        ]);

        return redirect('/compras')->with('success', 'Nota guardada correctamente');
    }

    // VISTA DE PLANIFICADOR
    public function vistaPlanificador()
    {
        $planificador = Planificador::where('user_id', auth()->id())->latest()->first();
        return view('notas.planificador', compact('planificador'));
    }

    // GUARDAR PLANIFICADOR
    public function guardarPlanificador(Request $request)
    {
        Planificador::create([
            'user_id' => auth()->id(),
            'lunes' => $request->input('lunes'),
            'martes' => $request->input('martes'),
            'miercoles' => $request->input('miercoles'),
            'jueves' => $request->input('jueves'),
            'viernes' => $request->input('viernes'),
            'objetivos' => $request->input('objetivos'),
            'notas' => $request->input('notas'),
        ]);

        return redirect('/planificador')->with('success', 'Planificador guardado correctamente');
    }




    // VISTA DE NOTAS CON FOTOS
public function vistaNotasFotos()
{
    $notas = NotaFoto::where('user_id', auth()->id())->latest()->get();
    return view('notas.fotos', compact('notas'));
}





// aqui para guardar las fotos 
public function guardarNotaFoto(Request $request)
{
    $request->validate([
        'foto' => 'required|image|max:2048',
        'nota' => 'required|string|max:1000',
    ]);

      $rutaImagen = null;

      if ($request->hasFile('foto')) {
        $archivo = $request->file('foto');
        $rutaImagen = $archivo->store('notas_fotos', 'public');
    }

    $path = $request->file('foto')->store('notas-fotos', 'public');

    NotaFoto::create([
        'user_id' => auth()->id(),
        'foto' => $path,
        'nota' => $request->input('nota'),
    ]);

    return redirect()->route('fotos.index')->with('success', 'Nota con foto guardada.');
}

public function mostrarContacto()
{
    return view('notas.contacto');
}

public function enviarContacto(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'message' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);


    return back()->with('success', 'Gracias por tu mensaje. Te responderemos pronto.');
}



}



