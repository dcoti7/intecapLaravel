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
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('idProfesor'); // int, primary key, auto_increment
            $table->string('nombreProfesor', 100); // varchar(100) not null
            $table->string('apellidoProfesor', 100); // varchar(100) not null
            $table->string('profesion', 100); // varchar(100) not null
            $table->string('email', 100); // varchar(100) not null
            $table->timestamps(); // Optional: adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
