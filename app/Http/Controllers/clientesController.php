<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use App\Models\clientes;
use \Crypt;
class clientesController extends Controller
{

    public function index(){
        $lista = DB::table('clientes')->get();
        return view('clientes', ['cuerpo' => $lista]);
    }
    
    public function editar($id)
    {
        $id =  Crypt::decrypt($id);
        $lista = DB::table('clientes')->find($id);
        return view('editarCliente', ['datos' => $lista]);
    }
    
    public function newCustomer(Request $request)
    {
        $newCustomer = new clientes;
        $newCustomer->entidad = $request->entidad; 
        $newCustomer->email = $request->email;
        $newCustomer->telefono = $request->telefono;
        $newCustomer->direccion = $request->direccion;
        $fechaCreacion = new DateTime();
        $fechaCreacion->format('Y-m-d H:i:s');
        $newCustomer->fecha=$fechaCreacion;
        $newCustomer->save();
        return redirect('/clientes')->with('message', 'Cliente creado con exito');
    }
    
    public function update(Request $request, $id)
    {
        $cliente =  clientes::findOrFail($id);
        $cliente->entidad = $request->entidad;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
         return redirect('/clientes')->with('message', 'Los datos se han editado con exito');
    
    }
    public function eliminar($id)
    {
        $item = clientes::find($id);
        $item->delete();
        return redirect('/clientes')->with('message', 'Los datos se han eliminado con exito');
    }
}
