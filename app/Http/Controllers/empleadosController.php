<?php



namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\personal;
use \Crypt;

class empleadosController extends Controller
{
    
    public function index(){
        $lista = DB::table('personal')->get();
        return view('personal', ['cuerpo' => $lista]);
    }

    public function editar($id){
        $id =  Crypt::decrypt($id);
        $lista = DB::table('personal')->find($id);
        return view('editarPersonal', ['datos' => $lista]);
    }

    public function newEmployee(Request $request)
    {
        $NewEmployee = new personal;
        $NewEmployee->nombre = $request->nombre; 
        $NewEmployee->emailPersonal = $request->emailPersonal;
        $NewEmployee->telefono = $request->telefono;
        $NewEmployee->direccion = $request->direccion;
        $NewEmployee->fechaContrato = $request->fechaContrato;
        $NewEmployee->save();
        return redirect('/empleados')->with('message', 'Nuevo empleado creado con exito');
    }

    public function update(Request $request, $id)
    {
        $empleado =  personal::findOrFail($id);
        $empleado->nombre = $request->nombre;
        $empleado->emailPersonal = $request->emailPersonal;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->fechaContrato = $request->fechaContrato;
        $empleado->save();
        return redirect('/empleados')->with('message', 'Empleado actualizado con exito');

    }
    
    public function eliminar($id)
    {
        $item = personal::find($id);  
        $item->delete();
        return redirect('/empleados')->with('message', 'Empleado eliminado con exito');
    }
}
