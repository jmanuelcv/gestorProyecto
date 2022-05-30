<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{


    protected $filiable =[/* 'nombre', */'email','password','rol','estado'];
    use HasFactory;
    public $timestamps = false;

}

