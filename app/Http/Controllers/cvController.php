<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;

use App\Models\curriculum;
class cvController extends Controller
{
    
    public function index(){
        $lista = DB::table('curriculum')->get();
        return view('curriculum', ['cuerpo' => $lista]);
    }


    public function newCv(Request $request)
    {
        $newCv = new curriculum;
        //nombre columnas
        $day = new DateTime();
        $day->format('Y-m-d');
        $newCv->nombre = $request->nombre;
        $newCv->email = $request->email;
        $newCv->fecha = $day;
        $newCv->telefono = $request->telefono;
     
        if($request->file){
            $file=$request->file("file");
            $nombre = $request->nombre."_".$request->fecha.   ".".$file->guessExtension();
            $ruta="cv/".$nombre;
            $destino = public_path($ruta);
            if($file->guessExtension()=="pdf"){
                copy($file, $destino);
                $newCv->ruta = $ruta;
                $newCv->save();
            }else{
                return ("NO ES UN PDF");
            }
        }
        //vista a la que se redirige el CV
        return view(); 
    }
  

    public function eliminar($id)
    {
        $item = curriculum::find($id);
        $item->delete();
        $archivo = public_path($item->ruta);
        if($archivo){  unlink($archivo);} 
           return redirect('/curriculum')->with('message', 'El archivo ha sido eliminado  con exito');
    }
}
