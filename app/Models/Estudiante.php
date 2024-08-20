<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    // Especifica el nombre de la clave primaria
    protected $primaryKey = 'idEstudiante';
    
    protected $fillable = [
        'idEstudiante',
        'nombreEstudiante',
        'apellidoEstudiante',
        'direccionEstudiante',
        'telefonoEstudiante',
        'emailEstudiante',
    ];
}
