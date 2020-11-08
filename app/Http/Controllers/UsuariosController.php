<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuariosFormRequest;
use App\Usuarios;
class UsuariosController extends Controller
{
  public function __construct()
  {
  }
  //resive como parametro la funcion de tipo  request
  //
  public function index(Request $request)
  {
    if ($request) {
      $query = trim($request->get('searchText'));
      $Usuarios = DB::table('Usuarios')->where('Nombre_Usuario', 'LIKE', '%' . $query . '%')
        ->orderBy('ID_Usuarios', 'ASC')
        ->paginate(7);
      return view('Administrador.View_Usuarios.index', ["Usuarios" => $Usuarios, "searchText" => $query]);
      //lo de arriba nos permitira buscar e
    }
  }

  public function create()
  {
    return view("Administrador.View_Usuarios.create");
  }

  public function store(UsuariosFormRequest $request)
  {
    $Usuarios = new Usuarios;
    $Usuarios->Nombre_Usuario = $request->get('Nombre_Usuario');
    $Usuarios->Apellido_Pa_Usuario = $request->get('Apellido_Pa_Usuario');
    $Usuarios->Apellido_Ma_Usuario = $request->get('Apellido_Ma_Usuario');
    $Usuarios->Edad = $request->get('Edad');
    $Usuarios->Sexo = $request->get('Sexo');
    $Usuarios->UserNme = $request->get('UserNme');
    $Usuarios->Psswr = $request->get('Psswr');
    $Usuarios->condicion = '1';
    $Usuarios->save();
    return Redirect::to('Administrador/View_Usuarios');
  }

  public function show($id)
  {
    return view("Administrador.View_Usuarios.show", ["Usuarios" => Usuarios::findOrFail($id)]);
  }

  public function edit($id)
  {
    $Usuarios= Usuarios::findOrFail($id);
    return view('Administrador.View_Usuarios.edit', ["Usuarios" => $Usuarios]);
  }

  public function update(UsuariosFormRequest $request, $id)
  {
    $Usuarios = Usuarios::findOrFail($id);
     $Usuarios->Nombre_Usuario = $request->get('Nombre_Usuario');
    $Usuarios->Apellido_Pa_Usuario = $request->get('Apellido_Pa_Usuario');
    $Usuarios->Apellido_Ma_Usuario = $request->get('Apellido_Ma_Usuario');
    $Usuarios->Edad = $request->get('Edad');
    $Usuarios->Sexo = $request->get('Sexo');
    $Usuarios->UserNme = $request->get('UserNme');
    $Usuarios->Psswr = $request->get('Psswr');
    $Usuarios->update();
    return Redirect::to('Administrador/View_Usuarios');
  }

  public function destroy($id)
  {
    /*$Usuarios = Usuarios::findOrFail($id);
    $Usuarios->condicion = "0";
    $Usuarios->update();
    return Redirect::to('Administrador.View_Usuarios');
 */
    
    $Usuarios = Usuarios::findOrFail($id);
    $Usuarios->delete();
    return redirect()
    ->route('View_Usuarios.index')
    ->with('message', 'se ha eliminado correctamente');
  }
}