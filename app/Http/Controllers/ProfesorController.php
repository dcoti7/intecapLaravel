<?php

namespace App\Http\Controllers;


use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    function index()
    {
        $profesores = Profesor::all();

        return view('profesores', compact('profesores'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombreProfesor' => 'required|string|max:250',
            'apellidoProfesor' => 'required|string|max:250',
            'profesion' => 'required|string|max:100',
            'email' => 'nullable|string|max:100',
        ]);

        // Verificar si el correo ya existe en la base de datos
        $existingProfesor = Profesor::where('email', $request->input('email'))->first();

        if ($existingProfesor) {
            // Si el correo ya existe, redirigir de vuelta con un mensaje de error
            return redirect()->back()->withErrors(['email' => 'El correo electrónico ya está registrado para otro profesor.'])->withInput();
        }

        Profesor::create($request->all());

        return redirect()->route('profesores.index')->with('success', 'Profesor agregado exitosamente');
    }

    public function destroy(Profesor $profesor)
    {

        try {
            // Lógica para eliminar el profesor
            $profesor->delete();
            return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente');
        } catch (\Exception $e) {
            // Si hay un error (como un error de clave foránea)
            return redirect()->route('profesores.index')->with('error', 'No se puede eliminar el profesor porque tiene cursos asociadas');
        }
    }

    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombreProfesor' => 'required|string|max:100',
            'apellidoProfesor' => 'required|string|max:100',
            'profesion' => 'required|string|max:100',
            'email' => 'nullable|string|max:100',
        ]);

        $profesor->update($request->all());

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente');
    }
}
