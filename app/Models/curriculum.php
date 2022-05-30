<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curriculum extends Model
{
    protected $table = "curriculum";
    protected $filiable =['nombre','fecha','email','telefono',"ruta"];
    use HasFactory;
    public $timestamps = false;
}
