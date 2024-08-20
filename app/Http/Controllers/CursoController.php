<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    function index()
    {
        $cursos = Curso::all();
        $profesores = Profesor::all();

        return view('cursos', compact('cursos', 'profesores'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'nombreCurso' => 'required|string|max:250',
            'descripcionCurso' => 'required|string',
            'creditosCurso' => 'required|integer',
            'idProfesor' => 'required|integer',

        ]);

        // Verificar si ya existe un curso con el mismo nombre y catedrático
        $existingCurso = Curso::where('nombreCurso', $request->input('nombreCurso'))
            ->where('idProfesor', $request->input('idProfesor'))
            ->first();

        if ($existingCurso) {
            // Si el curso con el mismo nombre y catedrático ya existe, redirigir de vuelta con un mensaje de error
            return redirect()->back()->withErrors(['nombreCurso' => 'El curso ya está registrado para este catedrático'])->withInput();
        }

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso agregado exitosamente');
    }

    public function destroy(Curso $curso)
    {

        try {
            // Lógica para eliminar el curso
            $curso->delete();
            return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente');
        } catch (\Exception $e) {
            // Si hay un error (como un error de clave foránea)
            return redirect()->route('cursos.index')->with('error', 'No se puede eliminar el curso porque tiene notas asociadas');
        }
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombreCurso' => 'required|string|max:250',
            'descripcionCurso' => 'required|string',
            'creditosCurso' => 'required|integer',
            'idProfesor' => 'required|integer',
        ]);

        // Verificar si ya existe un curso con el mismo nombre y catedrático
        $existingCurso = Curso::where('nombreCurso', $request->input('nombreCurso'))
            ->where('idProfesor', $request->input('idProfesor'))
            ->first();

        if ($existingCurso) {
            // Si el curso con el mismo nombre y catedrático ya existe, redirigir de vuelta con un mensaje de error
            return redirect()->back()->withErrors(['nombreCurso' => 'El curso ya está registrado para este catedrático'])->withInput();
        }

        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente');
    }
}
