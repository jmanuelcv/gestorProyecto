<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    protected $table = "personal";
    protected $filiable =['nombre','emailPersonal','direccion','telefono',"fechaContrato"];
    public $timestamps = false;
    use HasFactory;
}
