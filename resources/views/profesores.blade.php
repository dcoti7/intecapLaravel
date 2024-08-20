
<x-app>
    <link rel="stylesheet" href="{{ asset('css/estudiantes.css') }}">
    <div class="container">
        <div class="titulo">
            <h1>Profesores</h1>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarModal">+ Agregar</button>
        </div>

        <!-- Alerta de error si el correo ya está registrado -->
        @if ($errors->has('email'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first('email') }}
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
                <th scope="col">Profesion</th>
                <th scope="col">Email</th>
                <th scope="col">Editar Registro</th>
              </tr>
            </thead>
            <tbody>
                @foreach($profesores as $profesor)
                    <tr>
                        <td scope="row">{{ $profesor->idProfesor }}</td>
                        <td>{{ $profesor->nombreProfesor }}</td>
                        <td>{{ $profesor->apellidoProfesor }}</td>
                        <td>{{ $profesor->profesion }}</td>
                        <td>{{ $profesor->email }}</td>
                        <td class="button-container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarModal-{{ $profesor->idProfesor }}">Editar</button>
                                <form action="{{ route('profesores.destroy', $profesor->idProfesor) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                        </td>
                    </tr>

                    <!-- Modal para editar -->
                    <div class="modal fade" id="editarModal-{{ $profesor->idProfesor }}" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('profesores.update', $profesor->idProfesor) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel">Editar Profesor</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nombreProfesor">Nombre</label>
                                            <input type="text" class="form-control" id="nombreProfesor" name="nombreProfesor" value="{{ $profesor->nombreProfesor }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidoProfesor">Apellido</label>
                                            <input type="text" class="form-control" id="apellidoProfesor" name="apellidoProfesor" value="{{ $profesor->apellidoProfesor }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="profesion">Profesion</label>
                                            <input type="text" class="form-control" id="profesion" name="profesion" value="{{ $profesor->profesion }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $profesor->email }}">
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
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Profesor</h5>
                </div>
                <form action="{{ route('profesores.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombreProfesor">Nombre</label>
                            <input type="text" class="form-control" id="nombreProfesor" name="nombreProfesor" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidoProfesor">Apellido</label>
                            <input type="text" class="form-control" id="apellidoProfesor" name="apellidoProfesor" required>
                        </div>
                        <div class="form-group">
                            <label for="profesion">Profesion</label>
                            <input type="text" class="form-control" id="profesion" name="profesion" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
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