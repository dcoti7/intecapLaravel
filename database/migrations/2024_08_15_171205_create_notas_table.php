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
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('idNota'); // int, primary key, auto_increment
            $table->unsignedInteger('idEstudiante'); // int, foreign key
            $table->unsignedInteger('idCurso'); // int, foreign key
            $table->double('calificacion'); // double not null
            $table->date('fecha'); // date not null
            $table->timestamps(); // Optional: adds created_at and updated_at columns

            // Defining foreign keys
            $table->foreign('idEstudiante')->references('idEstudiante')->on('estudiantes')->onDelete('cascade');
            $table->foreign('idCurso')->references('idCurso')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
