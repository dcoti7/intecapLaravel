<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabla 'estudiantes'
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('idEstudiante');
            $table->string('nombreEstudiante', 250);
            $table->string('apellidoEstudiante', 250);
            $table->string('direccionEstudiante', 100);
            $table->string('telefonoEstudiante', 10)->nullable();
            $table->string('emailEstudiante', 100)->nullable();
            $table->timestamps(); // Esto añade las columnas created_at y updated_at
        });

        // Tabla 'profesores'
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('idProfesor');
            $table->string('nombreProfesor', 100);
            $table->string('apellidoProfesor', 100);
            $table->string('profesion', 100);
            $table->string('emailProfesor', 100);
            $table->timestamps(); // Esto añade las columnas created_at y updated_at
        });

        // Tabla 'cursos'
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('idCurso');
            $table->string('nombreCurso', 250);
            $table->text('descripcionCurso');
            $table->integer('creditosCurso');
            $table->unsignedInteger('idProfesor')->nullable();
            $table->foreign('idProfesor')->references('idProfesor')->on('profesores');
            $table->timestamps(); // Esto añade las columnas created_at y updated_at
        });

        // Tabla 'notas'
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('idNota');
            $table->unsignedInteger('idEstudiante')->nullable();
            $table->unsignedInteger('idCurso')->nullable();
            $table->foreign('idEstudiante')->references('idEstudiante')->on('estudiantes');
            $table->foreign('idCurso')->references('idCurso')->on('cursos');
            $table->double('calificacion');
            $table->timestamps(); // Esto añade las columnas created_at y updated_at
        });

        // Tabla 'horarios'
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('idHorario');
            $table->unsignedInteger('idCurso')->nullable();
            $table->unsignedInteger('idProfesor')->nullable();
            $table->foreign('idCurso')->references('idCurso')->on('cursos');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesores');
            $table->string('horaInicio', 100);
            $table->string('horaFin', 100);
            $table->timestamps(); // Esto añade las columnas created_at y updated_at
        });
    }

    public function down()
    {
        // Borrar las tablas en orden inverso para evitar problemas con las claves foráneas
        
        Schema::dropIfExists('horarios');
        Schema::dropIfExists('notas');
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('profesores');
        Schema::dropIfExists('estudiantes');
    }
};
