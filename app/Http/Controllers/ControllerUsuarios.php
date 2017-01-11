<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Request;

use App\Usuarios;
use App\User;


class ControllerUsuarios extends Controller {

    public function mostrarUsuarios(){
      $usuarios = Usuarios::all();
      // $usuario = new user ();
      // $usuario-> nombre = 'a';
      // $usuario-> apellidos = 'a';
      // $usuario-> telefono = 'a';
      // $usuario-> correo = 'a';


      return view('usuarios.lista_usuarios',['usuarios' => $usuarios] );
    }

    public function crear_usuario (Request $request)
    {

       $user = new Usuarios ();
       $user->nombre = $request->nombre;
       $user->apellido = $request->apellidos;
       $user->cedula = $request->cedula;
       $user->correo = $request->correo;
       $user->telefono = $request->telefono;
       $user->save();
       return redirect('usuarios');
    }

    public function consultar_usuario (Request $request)
    {

      $user = Usuarios::find ($request->id);
      return response()->json($user);
    }

    public function actualizar_usuario (Request $request)
    {

      $user = Usuarios::find ($request->id);
      $user->nombre = $request->edit_nombre;
      $user->apellido = $request->edit_apellidos;
      $user->correo = $request->edit_correo;
      $user->telefono = $request->edit_telefono;
      $user->save();
      return redirect('usuarios');
    }
    public function validar_cedula (Request $request)
    {
      $cedula = $request->cedula;
      $cant_usuarios = Usuarios::where ('cedula',$cedula)->count();
      if  ($cant_usuarios > 0)
      {
          return response('Hello World', 400);
      }
      else {
        {
          return response('Hello World', 200);
        }
      }

    }

    public function validar_correo (Request $request)
    {
      $correo = $request->correo;
      $cant_usuarios = Usuarios::where ('correo',$correo)->count();
      if  ($cant_usuarios > 0)
      {
          return response('Hello World', 400);
      }
      else {
        {
          return response('Hello World', 200);
        }
      }

    }

}
?>
