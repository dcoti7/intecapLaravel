
<x-app>
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
    <div class="container">
        <div class="titulo">
            <h1>Horarios</h1>
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
                <th scope="col">Curso</th>
                <th scope="col">Profesor</th>
                <th scope="col">Hora Inicio</th>
                <th scope="col">Hora Fin</th>
                <th scope="col">Editar Registro</th>
              </tr>
            </thead>
            <tbody>
                @foreach($horarios as $horario)
                    <tr>
                        <td scope="row">{{ $horario->idHorario }}</td>
                        
                        <td>
                            @php
                                $curso = $cursos->firstWhere('idCurso', $horario->idCurso);
                            @endphp
                            {{ $curso->nombreCurso }}
                        </td>
                        <td>
                            @php
                                $profesor = $profesores->firstWhere('idProfesor', $horario->idProfesor);
                            @endphp
                            {{ $profesor->nombreProfesor }}
                        </td>
                        <td>{{ $horario->horaInicio }}</td>
                        <td>{{ $horario->horaFin }}</td>
                        <td class="button-container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal-{{ $horario->idHorario }}">Editar</button>
                                <form action="{{ route('horarios.destroy', $horario->idHorario) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                        </td>
                    </tr>

                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal-{{ $horario->idHorario }}" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('horarios.update', $horario->idHorario) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel">Editar Horario</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="idCurso">Nombre Curso</label>
                                            <select class="form-control" id="idCurso" name="idCurso" required>
                                                <option value="">Seleccione Curso</option>
                                                @foreach($cursos as $curso)
                                                    <option value="{{ $curso->idCurso }}">{{ $curso->nombreCurso }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="idProfesor">Nombre Profesor</label>
                                            <select class="form-control" id="idProfesor" name="idProfesor" required>
                                                <option value="">Seleccione un Profesor</option>
                                                @foreach($profesores as $profesor)
                                                    <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombreProfesor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="horaInicio">Hora Inicio</label>
                                            <input type="time" class="form-control" id="horaInicio" name="horaInicio" value="{{ $horario->horaInicio }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="horaFin">Hora Fin</label>
                                            <input type="time" class="form-control" id="horaFin" name="horaFin" value="{{ $horario->horaFin }}" required>
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
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Horario</h5>
                </div>
                <form action="{{ route('horarios.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="idCurso">Nombre Curso</label>
                            <select class="form-control" id="idCurso" name="idCurso" required>
                                <option value="">Seleccione Curso</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->idCurso }}">{{ $curso->nombreCurso }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idProfesor">Nombre Profesor</label>
                            <select class="form-control" id="idProfesor" name="idProfesor" required>
                                <option value="">Seleccione un Profesor</option>
                                @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombreProfesor }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="horaInicio">Hora Inicio</label>
                            <input type="time" class="form-control" id="horaInicio" name="horaInicio" required>
                        </div>
                        <div class="form-group">
                            <label for="horaFin">Hora Fin</label>
                            <input type="time" class="form-control" id="horaFin" name="horaFin" required>
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