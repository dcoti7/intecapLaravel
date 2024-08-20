
<x-app>
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
    <div class="container">
        <div class="titulo">
            <h1>Cursos</h1>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarModal">+ Agregar</button>
        </div>

        <!-- Alerta de error si el curso ya está registrado -->
        @if ($errors->has('nombreCurso'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('nombreCurso') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif

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
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Profesor</th>
                <th scope="col">Creditos</th>
                <th scope="col">Editar Registro</th>
              </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td scope="row">{{ $curso->idCurso }}</td>
                        <td>{{ $curso->nombreCurso }}</td>
                        <td>{{ $curso->descripcionCurso }}</td>
                        <td>
                            @php
                                $profesor = $profesores->firstWhere('idProfesor', $curso->idProfesor);
                            @endphp
                            {{ $profesor->nombreProfesor }}
                        </td>
                        <td>{{ $curso->creditosCurso }}</td>
                        <td class="button-container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal-{{ $curso->idCurso }}">Editar</button>
                                <form action="{{ route('cursos.destroy', $curso->idCurso) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                        </td>
                    </tr>

                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal-{{ $curso->idCurso }}" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('cursos.update', $curso->idCurso) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel">Editar Curso</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nombreCurso">Nombre</label>
                                            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" value="{{ $curso->nombreCurso }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcionCurso">Descripcion</label>
                                            <input type="text" class="form-control" id="descripcionCurso" name="descripcionCurso" value="{{ $curso->descripcionCurso }}" required>
                                        </div>
                                        <select class="form-control" id="idProfesor" name="idProfesor" required>
                                            <option value="">Seleccione Profesor</option>
                                            @foreach($profesores as $profesor)
                                                <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombreProfesor }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label for="creditosCurso">Créditos</label>
                                            <input type="number" class="form-control" id="creditosCurso" name="creditosCurso" value="{{ $curso->creditosCurso }}" required>
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

    <!-- Modal para Agregar Curso -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Curso</h5>
                </div>
                <form action="{{ route('cursos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombreCurso">Nombre</label>
                            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcionCurso">Descripcion</label>
                            <input type="text" class="form-control" id="descripcionCurso" name="descripcionCurso" required>
                        </div>
                        <label for="idProfesor">Nombre Profesor</label>
                        <select class="form-control" id="idProfesor" name="idProfesor" required>
                            <option value="">Seleccione el Profesor</option>
                            @foreach($profesores as $profesor)
                                <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombreProfesor }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="creditosCurso">Creditos</label>
                            <input type="number" class="form-control" id="creditosCurso" name="creditosCurso" required>
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