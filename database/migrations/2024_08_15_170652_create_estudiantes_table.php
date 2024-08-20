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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('idEstudiante'); // int, primary key, auto_increment
            $table->string('nombreEstudiante', 250); // varchar(250) not null
            $table->string('apellidoEstudiante', 250); // varchar(250) not null
            $table->string('direccionEstudiante', 100); // varchar(100) not null
            $table->string('telefonoEstudiante', 10)->nullable(); // varchar(10), nullable
            $table->string('emailEstudiante', 100)->nullable(); // varchar(100), nullable
            $table->timestamps(); // Optional: adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
