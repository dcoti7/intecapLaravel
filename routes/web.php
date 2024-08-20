<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('home');
})->name('inicio');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores.index');
Route::post('/profesores', [ProfesorController::class, 'store'])->name('profesores.store');
Route::delete('/profesores/{profesor}', [ProfesorController::class, 'destroy'])->name('profesores.destroy');
Route::put('/profesores/{profesor}', [ProfesorController::class, 'update'])->name('profesores.update');

Route::get('/notas', [NotaController::class, 'index'])->name('notas.index');
Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');
Route::delete('/notas/{nota}', [NotaController::class, 'destroy'])->name('notas.destroy');
Route::put('/notas/{nota}', [NotaController::class, 'update'])->name('notas.update');

Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
Route::delete('/horarios/{horario}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
Route::put('/horarios/{horario}', [HorarioController::class, 'update'])->name('horarios.update');   