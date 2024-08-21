<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('idNota');
            $table->unsignedInteger('idEstudiante')->nullable();
            $table->unsignedInteger('idCurso')->nullable();
            $table->foreign('idEstudiante')->references('idEstudiante')->on('estudiantes');
            $table->foreign('idCurso')->references('idCurso')->on('cursos');
            $table->double('calificacion');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
