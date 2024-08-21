<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('idCurso');
            $table->string('nombreCurso', 250);
            $table->text('descripcionCurso');
            $table->integer('creditosCurso');
            $table->unsignedInteger('idProfesor')->nullable();
            $table->foreign('idProfesor')->references('idProfesor')->on('profesores');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
