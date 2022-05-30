<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
    protected $table = "tareas";
    protected $filiable =["idUsuario", "nombre", "descripcion", "horasPlanificadas", "estado", "fechaInicio", "fechaFin"];
    public $timestamps = false;
    use HasFactory;
}
