<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
     // Especificar el nombre de la tabla
     protected $table = 'notas';

     // Especificar la clave primaria si es diferente a 'id'
     protected $primaryKey = 'idNota';
 
     // Indicar que la clave primaria es auto-incremental
     public $incrementing = true;
 
     // Especificar el tipo de la clave primaria
     protected $keyType = 'int';
 
     // Definir los campos que pueden ser asignados masivamente
     protected $fillable = [
         'idEstudiante',
         'idCurso',
         'calificacion',
         'fecha',
     ];
 
}
