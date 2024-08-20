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
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('idCurso'); // int, primary key, auto_increment
            $table->string('nombreCurso', 250); // varchar(250) not null
            $table->text('descripcionCurso'); // text not null
            $table->integer('creditosCurso'); // int not null
            $table->timestamps(); // Optional: adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
