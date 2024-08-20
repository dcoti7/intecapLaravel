<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'horarios';

    // Especificar la clave primaria si no sigue la convención de Laravel
    protected $primaryKey = 'idHorario';

    // Especificar los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'idCurso',
        'idProfesor',
        'horaInicio',
        'horaFin',
    ];
}
