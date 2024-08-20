
<x-app>
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
    <div class="container">
        <div class="titulo">
            <h1>Notas</h1>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarModal">+ Agregar</button>
        </div>

        <!-- Alerta de error si el correo ya está registrado -->
        {{-- @if ($errors->has('emailEstudiante'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('emailEstudiante') }}
            </div>
        @endif --}}

        <!-- Alerta de éxito si el estudiante fue agregado -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <table class="table">
            <thead>
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Curso</th>
                <th scope="col">Calificación</th>
                <th scope="col">Editar Registro</th>
              </tr>
            </thead>
            <tbody>
                @foreach($notas as $nota)
                    <tr>
                        <td scope="row">{{ $nota->idNota }}</td>
                        
                        <td>
                            @php
                                $estudiante = $estudiantes->firstWhere('idEstudiante', $nota->idEstudiante);
                            @endphp
                            {{ $estudiante->nombreEstudiante }}
                        </td>
                        <td>
                            @php
                                $curso = $cursos->firstWhere('idCurso', $nota->idCurso);
                            @endphp
                            {{ $curso->nombreCurso }}
                        </td>
                        <td>{{ $nota->calificacion }}</td>
                        <td class="button-container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal-{{ $nota->idNota }}">Editar</button>
                                <form action="{{ route('notas.destroy', $nota->idNota) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                        </td>
                    </tr>

                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal-{{ $nota->idNota }}" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('notas.update', $nota->idNota) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel">Editar Estudiante</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="idEstudiante">Nombre Estudiante</label>
                                            <select class="form-control" id="idEstudiante" name="idEstudiante" required>
                                                <option value="">Seleccione estudiante</option>
                                                @foreach($estudiantes as $estudiante)
                                                    <option value="{{ $estudiante->idEstudiante }}">{{ $estudiante->nombreEstudiante }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="idCurso">Nombre Curso</label>
                                            <select class="form-control" id="idCurso" name="idCurso" required>
                                                <option value="">Seleccione un curso</option>
                                                @foreach($cursos as $curso)
                                                    <option value="{{ $curso->idCurso }}">{{ $curso->nombreCurso }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="calificacion">Calificacion</label>
                                            <input type="text" class="form-control" id="calificacion" name="calificacion" value="{{ $nota->calificacion }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para Agregar Estudiante -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Nota</h5>
                </div>
                <form action="{{ route('notas.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="idEstudiante">Nombre Estudiante</label>
                            <select class="form-control" id="idEstudiante" name="idEstudiante" required>
                                <option value="">Seleccione estudiante</option>
                                @foreach($estudiantes as $estudiante)
                                    <option value="{{ $estudiante->idEstudiante }}">{{ $estudiante->nombreEstudiante }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idCurso">Nombre Curso</label>
                            <select class="form-control" id="idCurso" name="idCurso" required>
                                <option value="">Seleccione un curso</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->idCurso }}">{{ $curso->nombreCurso }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacion">Calificacion</label>
                            <input type="text" class="form-control" id="calificacion" name="calificacion" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>