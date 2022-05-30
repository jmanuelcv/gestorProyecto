<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = "clientes";
    protected $filiable =['nombre','email','direccion','telefono','fecha'];
    public $timestamps = false;
    use HasFactory;
}
