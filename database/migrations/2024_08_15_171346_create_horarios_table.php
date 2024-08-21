<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('idHorario');
            $table->unsignedInteger('idCurso')->nullable();
            $table->unsignedInteger('idProfesor')->nullable();
            $table->foreign('idCurso')->references('idCurso')->on('cursos');
            $table->foreign('idProfesor')->references('idProfesor')->on('profesores');
            $table->string('horaInicio', 100);
            $table->string('horaFin', 100);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
