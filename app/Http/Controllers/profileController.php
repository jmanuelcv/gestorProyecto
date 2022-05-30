<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index(){
  $id= auth()->user()->idPersonal ;
    
        $datos = DB::table('personal')->find($id);
        
          return view('perfil', ['datos' => $datos]);
      }
  
}
