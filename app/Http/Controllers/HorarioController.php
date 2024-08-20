<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Horario;
use App\Models\Profesor;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    function index()
    {

        $horarios = Horario::all();
        $profesores = Profesor::all();
        $cursos = Curso::all();

        return view('horarios', compact('horarios', 'profesores', 'cursos'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'idCurso' => 'required|integer',
            'idProfesor' => 'required|integer',
            'horaInicio' => 'required|string|max:100',
            'horaFin' => 'required|string|max:100',
        ]);
        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario agregado exitosamente');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente');
        
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'idCurso' => 'required|integer',
            'idProfesor' => 'required|integer',
            'horaInicio' => 'required|string|max:100',
            'horaFin' => 'required|string|max:100',
        ]);

        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente');
    }
}
