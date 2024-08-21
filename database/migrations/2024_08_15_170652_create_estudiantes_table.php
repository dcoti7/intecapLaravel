<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('idEstudiante');
            $table->string('nombreEstudiante', 250);
            $table->string('apellidoEstudiante', 250);
            $table->string('direccionEstudiante', 100);
            $table->string('telefonoEstudiante', 10)->nullable();
            $table->string('emailEstudiante', 100)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
