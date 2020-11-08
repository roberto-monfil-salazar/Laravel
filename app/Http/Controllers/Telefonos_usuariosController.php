<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Telefonos_usuariosFormRequest;
use App\Telefonos_usuarios;
use App\Usuarios;
class Telefonos_usuariosController extends Controller
{
  public function __construct()
  {
  }
  //resive como parametro la funcion de tipo  request
  //
  public function index(Request $request)
  {


//  $Usuarios=DB::table('Usuarios')->get();
if ($request) {
      $query = trim($request->get('searchText'));
    
      $Telefonos_usuarios = DB::table('Telefonos_usuarios as teu')
      ->join('Usuarios as us', 'teu.ID_Usuarios','=','us.ID_Usuarios')
      ->where('teu.Numero_Telefono', 'LIKE', '%' . $query . '%')
        ->orderBy('teu.ID_Telefonos_Usuarios', 'ASC')
        ->paginate(7);
      return view('Administrador.View_Telefonos_usuarios.index', ["Telefonos_usuarios" => $Telefonos_usuarios, "searchText" => $query] );













    }
  }

  public function create()
  {
    $Usuarios=DB::table('Usuarios')->get();
    return view("Administrador.View_Telefonos_usuarios.create",["Usuarios"=>$Usuarios]);
  }

  public function store(Telefonos_usuariosFormRequest $request)
  {
    $Telefonos_usuarios = new Telefonos_usuarios;
    $Telefonos_usuarios->tipoDe_Telefono = $request->get('tipoDe_Telefono');
    $Telefonos_usuarios->Numero_Telefono = $request->get('Numero_Telefono');


    $Telefonos_usuarios->ID_Usuarios = $request->get('ID_Usuarios');
    

   
    $Telefonos_usuarios->save();
    return Redirect::to('Administrador/View_Telefonos_usuarios');
  }

  public function show($id)
  {
    return view("Administrador.View_Telefonos_usuarios.show", ["Telefonos_usuarios" => Telefonos_usuarios::findOrFail($id)]);
  }

  public function edit($id)
  {
    $Telefonos_usuarios= Telefonos_usuarios::findOrFail($id);
    $Usuarios=DB::table('Usuarios')->get();
    return view('Administrador.View_Telefonos_usuarios.edit', ["Telefonos_usuarios" => $Telefonos_usuarios, "Usuarios"=>$Usuarios]);
  }

  public function update(Telefonos_usuariosFormRequest $request, $id)
  {
    $Telefonos_usuarios = Telefonos_usuarios::findOrFail($id);
     $Telefonos_usuarios->tipoDe_Telefono = $request->get('tipoDe_Telefono');
    $Telefonos_usuarios->Numero_Telefono = $request->get('Numero_Telefono');

     $Telefonos_usuarios->ID_Usuarios = $request->get('ID_Usuarios');
   
    $Telefonos_usuarios->update();
    return Redirect::to('Administrador/View_Telefonos_usuarios');
  }

  public function destroy($id)
  {
    /*$Telefonos_usuarios = Telefonos_usuarios::findOrFail($id);
    $Telefonos_usuarios->condicion = "0";
    $Telefonos_usuarios->update();
    return Redirect::to('Administrador.View_Telefonos_usuarios');
 */
    
    $Telefonos_usuarios = Telefonos_usuarios::findOrFail($id);
    $Telefonos_usuarios->delete();
    return redirect()
    ->route('View_Telefonos_usuarios.index')
    ->with('message', 'se ha eliminado correctamente');
  }
}