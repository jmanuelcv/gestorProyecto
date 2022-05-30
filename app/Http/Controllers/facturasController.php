<?php

namespace App\Http\Controllers;
use DB;
use DateTime;

use App\Models\facturas;

use Illuminate\Http\Request;

class facturasController extends Controller
{
    public function index(){
        $lista = DB::table('facturas')->get();
        $clientes = DB::table('clientes')
        ->select('id', 'entidad')
        ->get();       
        return view('facturas', ['cuerpo' => $lista],['clientes' => $clientes]);
    }


    public function new(Request $request)
    {
        $new = new facturas; 
        $new->concepto = $request->concepto;
        $new->fecha = $request->fecha;
        $new->total = $request->total;
        $new->idCliente = $request->get('idCliente');
        if($request->file){
            $file=$request->file("file");
        //se cifra el nombre del archivo
        $nombre = bin2hex(random_bytes(5)).".".$file->guessExtension();
        $ruta="pdf/".$nombre;
                    $destino = public_path($ruta);
                    if($file->guessExtension()=="pdf"){
                        copy($file, $destino);
                        $new->ruta = $ruta;
                        $new->save();
                    }else{
                        return redirect('/facturas')->with('error', 'No es un pdf');
                    }
        }
        return redirect('/facturas')->with('message', 'Nueva factura creada con exito');
    }
  

    public function eliminar($id)
    {
        $item = facturas::find($id);
        $item->delete();
        $archivo = public_path($item->ruta);
        if($archivo){  unlink($archivo);} 
        return redirect('/facturas')->with('message', 'Factura eliminada  con exito'); 
        }

    public function estadisticas()
    {
        $datos= DB::table('facturas')
        ->select('clientes.entidad','facturas.total','facturas.fecha','facturas.ruta')
        ->join('clientes','clientes.id', '=', 'facturas.idCliente')
        ->orderBy('facturas.fecha')
        ->get();
       $total = DB::table("facturas")->sum('total');
        $totalMes=facturas::whereMonth('fecha', now()->month)->sum('total');  
        $clientesMes=DB::table("clientes")->whereMonth('fecha', now()->month)->count();
        $tp5 =  DB::table('facturas')
        ->select('clientes.entidad', DB::raw("SUM(total) as count"))
        ->join('clientes','clientes.id', '=', 'facturas.idCliente')
        ->groupBy('clientes.entidad')
        ->limit(5)
        ->get();
         return view('estadisticas',compact('datos','total','totalMes','tp5','clientesMes'));
    }

}
