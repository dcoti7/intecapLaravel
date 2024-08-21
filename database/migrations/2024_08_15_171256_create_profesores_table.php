<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('idProfesor');
            $table->string('nombreProfesor', 100);
            $table->string('apellidoProfesor', 100);
            $table->string('profesion', 100);
            $table->string('emailProfesor', 100);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesores');
    }
};
