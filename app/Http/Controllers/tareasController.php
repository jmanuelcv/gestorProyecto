<?php

namespace App\Http\Controllers;
use DB;
use App\Models\tareas;
use Illuminate\Http\Request;
use \Crypt;
class tareasController extends Controller
{
 
    public function index(){
        $lista = DB::table('tareas')->get();
        $usuarios = DB::table('users')
        ->select('id', 'email')
        ->get();
        return view('tareas', ['cuerpo' => $lista],['usuarios' => $usuarios]);
    }
        
    public function editarTareas($id)
    {
        $lista = DB::table('tareas')->find($id);
        $usuarios = DB::table('users')
        ->select('id', 'email')
        ->get();
        return view('editarTareas', ['datos' => $lista],['usuarios' => $usuarios]);
    }
    
    public function nuevaTarea(Request $request)
    {
        $nuevaTarea = new tareas;
        $nuevaTarea->nombre = $request->nombre; 
        $nuevaTarea->descripcion = $request->descripcion;
        $nuevaTarea->idUsuario = $request->idUsuario;
        $nuevaTarea->horasPlanificadas = $request->horasPlanificadas; 
        $nuevaTarea->estado = "Abierta";
        $nuevaTarea->fechaInicio = $request->fechaInicio;
        $nuevaTarea->fechaFin = $request->fechaFin;
        $nuevaTarea->save();
        return redirect('/tareas')->with('message', 'La nueva tarea se ha creado con exito');
    }
    



    public function updateTareas(Request $request, $id)
    {
        $nuevaTarea =  tareas::findOrFail($id);
        $nuevaTarea->nombre = $request->nombre; 
        $nuevaTarea->descripcion = $request->descripcion;
        $nuevaTarea->idUsuario = $request->idUsuario;
        $nuevaTarea->horasPlanificadas = $request->horasPlanificadas; 
        if($request->fechaInicio){
            $nuevaTarea->fechaInicio = $request->fechaInicio;
        }else if($request->fechaFin){
            $nuevaTarea->fechaFin = $request->fechaFin;
        }else if($request->fechaFin && $request->fechaInicio){
            $nuevaTarea->fechaInicio = $request->fechaInicio;
            $nuevaTarea->fechaFin = $request->fechaFin;
        }
        $nuevaTarea->save();
        return redirect('/tareas')->with('message', 'La tarea se ha actualizado con exito');
    }





    public function eliminarTareas($id)
    {
        $item = tareas::findOrFail($id);
        $item->delete();
        return redirect('/tareas')->with('message', 'La tarea se ha eliminadocon exito');
    }


    public function estadoTarea(Request $request, $id)
    {
      if($request->estado=="abrir"){
           $estado="Abierta";
        }else{
            $estado="Cerrada";
        }
        DB::update('update tareas set estado=? where id = ?', ["$estado", $id]);
        return redirect('/tareas')->with('message', 'Tarea actualizada con exito');    
    }

}
