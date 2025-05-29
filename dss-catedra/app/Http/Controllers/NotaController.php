<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nota;

class NotaController extends Controller
{
    public function index()
    {
        // Muestra todas las notas del usuario autenticado
        $notas = Nota::where('user_id', Auth::id())->get();
        return view('dashboard', compact('notas'));
    }

    public function crear()
    {
        // Muestra el formulario para crear una nota
        return view('nueva-nota');
    }

    public function guardar(Request $request)
    {
        // Validar campos
        $request->validate([
            'note-title' => 'required|string|max:255',
            'note-content' => 'required|string',
        ]);

        // Crear y guardar la nota
        Nota::create([
            'titulo' => $request->input('note-title'),
            'contenido' => $request->input('note-content'),
            'user_id' => Auth::id(),
        ]);

        // Redirigir al dashboard
        return redirect()->route('dashboard')->with('bueno', 'Nota guardada correctamente.');
    }




  public function todas()
{
    $notas = Nota::where('user_id', Auth::id())->latest()->get();
    return view('notas.index', compact('notas'));
}




public function editar($id)
{
    $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    return view('notas.editar', compact('nota'));
}





public function actualizar(Request $request, $id)
{
    $request->validate([
        'note-title' => 'required|string|max:255',
        'note-content' => 'required|string',
    ]);

    $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $nota->update([
        'titulo' => $request->input('note-title'),
        'contenido' => $request->input('note-content'),
    ]);

    return redirect()->route('nota.index')->with('nice', 'su nota se edito correctamente');
}







public function eliminar($id)
{
    $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $nota->delete();

   return redirect()->route('nota.index')->with('eliminada', 'Nota eliminada correctamente.');

}






}





