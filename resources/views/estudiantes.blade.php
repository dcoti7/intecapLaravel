
<x-app>
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
    <div class="container">
        <div class="titulo">
            <h1>Estudiantes</h1>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarModal">+ Agregar</button>
        </div>

        <!-- Alerta de error si el correo ya está registrado -->
        @if ($errors->has('emailEstudiante'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('emailEstudiante') }}
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
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Editar Registro</th>
              </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                    <tr>
                        <td scope="row">{{ $estudiante->idEstudiante }}</td>
                        <td>{{ $estudiante->nombreEstudiante }}</td>
                        <td>{{ $estudiante->apellidoEstudiante }}</td>
                        <td>{{ $estudiante->direccionEstudiante }}</td>
                        <td>{{ $estudiante->telefonoEstudiante }}</td>
                        <td>{{ $estudiante->emailEstudiante }}</td>
                        <td class="button-container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal-{{ $estudiante->idEstudiante }}">Editar</button>
                                <form action="{{ route('estudiantes.destroy', $estudiante->idEstudiante) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                        </td>
                    </tr>

                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal-{{ $estudiante->idEstudiante }}" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('estudiantes.update', $estudiante->idEstudiante) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel">Editar Estudiante</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nombreEstudiante">Nombre</label>
                                            <input type="text" class="form-control" id="nombreEstudiante" name="nombreEstudiante" value="{{ $estudiante->nombreEstudiante }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidoEstudiante">Apellido</label>
                                            <input type="text" class="form-control" id="apellidoEstudiante" name="apellidoEstudiante" value="{{ $estudiante->apellidoEstudiante }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccionEstudiante">Dirección</label>
                                            <input type="text" class="form-control" id="direccionEstudiante" name="direccionEstudiante" value="{{ $estudiante->direccionEstudiante }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefonoEstudiante">Teléfono</label>
                                            <input type="text" class="form-control" id="telefonoEstudiante" name="telefonoEstudiante" value="{{ $estudiante->telefonoEstudiante }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailEstudiante">Email</label>
                                            <input type="email" class="form-control" id="emailEstudiante" name="emailEstudiante" value="{{ $estudiante->emailEstudiante }}">
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
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Estudiante</h5>
                </div>
                <form action="{{ route('estudiantes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombreEstudiante">Nombre</label>
                            <input type="text" class="form-control" id="nombreEstudiante" name="nombreEstudiante" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidoEstudiante">Apellido</label>
                            <input type="text" class="form-control" id="apellidoEstudiante" name="apellidoEstudiante" required>
                        </div>
                        <div class="form-group">
                            <label for="direccionEstudiante">Dirección</label>
                            <input type="text" class="form-control" id="direccionEstudiante" name="direccionEstudiante" required>
                        </div>
                        <div class="form-group">
                            <label for="telefonoEstudiante">Teléfono</label>
                            <input type="text" class="form-control" id="telefonoEstudiante" name="telefonoEstudiante" required>
                        </div>
                        <div class="form-group">
                            <label for="emailEstudiante">Email</label>
                            <input type="email" class="form-control" id="emailEstudiante" name="emailEstudiante" required>
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