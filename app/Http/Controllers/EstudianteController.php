<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();

        return view('estudiantes', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreEstudiante' => 'required|string|max:250',
            'apellidoEstudiante' => 'required|string|max:250',
            'direccionEstudiante' => 'required|string|max:100',
            'telefonoEstudiante' => 'nullable|string|max:10',
            'emailEstudiante' => 'nullable|string|email|max:100',
        ]);

        // Verificar si el correo ya existe en la base de datos
        $existingEstudiante = Estudiante::where('emailEstudiante', $request->input('emailEstudiante'))->first();

        if ($existingEstudiante) {
            // Si el correo ya existe, redirigir de vuelta con un mensaje de error
            return redirect()->back()->withErrors(['emailEstudiante' => 'El correo electrónico ya está registrado para otro estudiante.'])->withInput();
        }

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante agregado exitosamente');
    }

    public function destroy(Estudiante $estudiante)
    {

        try {
            // Lógica para eliminar el estudiante
            $estudiante->delete();
            return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente');
        } catch (\Exception $e) {
            // Si hay un error (como un error de clave foránea)
            return redirect()->route('estudiantes.index')->with('error', 'No se puede eliminar el estudiante porque tiene notas asociadas');
        }
        
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombreEstudiante' => 'required|string|max:250',
            'apellidoEstudiante' => 'required|string|max:250',
            'direccionEstudiante' => 'required|string|max:100',
            'telefonoEstudiante' => 'nullable|string|max:10',
            'emailEstudiante' => 'nullable|string|email|max:100',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente');
    }
}
