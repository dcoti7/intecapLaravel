<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('idHorario'); // int, primary key, auto_increment
            $table->unsignedInteger('idCurso'); // int, foreign key
            $table->unsignedInteger('idProfesor'); // int, foreign key
            $table->string('diaSemana', 250); // varchar(250) not null
            $table->string('horaInicio', 100); // varchar(100) not null
            $table->string('horaFin', 100); // varchar(100) not null
            $table->timestamps(); // Optional: adds created_at and updated_at columns

            // Defining foreign keys
            $table->foreign('idCurso')->references('idCurso')->on('cursos')->onDelete('cascade');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
