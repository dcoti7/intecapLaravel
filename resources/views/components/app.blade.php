<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset( 'css/style.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul class="nav  bg-dark justify-content-center">
                <li class="nav-item">
                  <a class="nav-link  text-light"  href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('cursos.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('notas.index') }}">Notas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('profesores.index') }}">Profesor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('horarios.index') }}">Horarios</a>
                </li>
              </ul>
        </nav>
    </header>
    {{$slot}}

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
      
      <div class="bg-dark text-center py-3">
          <p class="mb-0">&copy; Fullstack Todos los derechos reservados.</p>
      </div>
  </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>