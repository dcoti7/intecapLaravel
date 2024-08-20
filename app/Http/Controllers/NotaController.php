<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    //
    function index(){
        $notas = Nota::all();
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        return view('notas', compact('notas', 'estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idEstudiante' => 'required|integer',
            'idCurso' => 'required|integer',
            'calificacion' => 'required|integer',
        ]);

        
        Nota::create($request->all());

        return redirect()->route('notas.index')->with('success', 'Nota agregada exitosamente');
    }

    public function destroy(Nota $nota)
    {
        $nota->delete();
        return redirect()->route('notas.index')->with('success', 'Nota eliminada exitosamente');
    }

    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'idEstudiante' => 'required|integer',
            'idCurso' => 'required|integer',
            'calificacion' => 'required|integer',
        ]);

        $nota->update($request->all());

        return redirect()->route('notas.index')->with('success', 'Nota actualizada exitosamente');
    }
}
