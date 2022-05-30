<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Crypt;

class userController extends Controller
{
 
    public function index(){
        $lista = DB::table('users')->get();
        $personal = DB::table('personal')
                ->select('id', 'nombre')
                ->get();
        return view('usuarios', ['cuerpo' => $lista],['personal' => $personal]);
    }

    public function editar($id)
    {
        $id =  Crypt::decrypt($id);
        $lista = DB::table('users')->find($id);
        return view('editar', ['datos' => $lista]);
    }

    public function newUser(Request $request)
    {
        $newUser = new users;
        $newUser->idPersonal = $request->get('idPersonal');
        $newUser->email = $request->email;
        $newUser->rol = $request->rol;
        $newUser->password=Hash::make($request->password);
        $newUser->estado=0;
        $newUser->save();
        return redirect('/usuarios')->with('message', 'Usuario creado con exito');
    }

    public function update(Request $request, $id)
    {
        $user =  users::findOrFail($id);
        $user->email = $request->email;
        if($request->password!=""){$user->password=Hash::make($request->password);}
        if($request->rol!=""){  $user->rol = $request->rol;}
        $user->save();
        return redirect('/usuarios')->with('message', 'Usuario actualizado con exito');
    }

    public function pass(Request $request)
    {
        $id=auth()->user()->id;
        if($request->password1 ==$request->password2 ){
            $password=Hash::make($request->password1);
            DB::update('update users set    password = ? where id = ?', ["$password", $id]); 
            //ejemplo validacion
            return redirect()->back()->with('message', 'La contraseña se ha actualizado con exito');
        }else{
            return redirect()->back()->with('error', 'Las contraseñas deben ser iguales');
        }
    }




    public function estado(Request $request, $id)
    {
    if($request->estado=="alta"){
        $estado=1;
        }else{
            $estado=0;
        }
        DB::update('update users set estado=? where id = ?', ["$estado", $id]);
        return redirect('/usuarios')->with('message', 'El estado se ha cambiado con exito');;
    }


}
