<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesores';
    protected $primaryKey = 'idProfesor';

    protected $fillable = [
        'idProfesor',
        'nombreProfesor',
        'apellidoProfesor',
        'profesion',
        'email',
    ];
}
