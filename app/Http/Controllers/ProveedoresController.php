<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedoresFormRequest;
use App\Proveedores;
class ProveedoresController extends Controller
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
      $Proveedores = DB::table('Proveedores')->where('Nombre_proveedor', 'LIKE', '%' . $query . '%')
        ->orderBy('ID_Proveedores', 'ASC')
        ->paginate(7);
      return view('Administrador.View_Proveedores.index', ["Proveedores" => $Proveedores, "searchText" => $query]);
      //lo de arriba nos permitira buscar e
    }
  }

  public function create()
  {
    return view("Administrador.View_Proveedores.create");
  }

  public function store(ProveedoresFormRequest $request)
  {
    $Proveedores = new Proveedores;
    $Proveedores->Nombre_proveedor = $request->get('Nombre_proveedor');
    $Proveedores->CorreoElectronico_proveedor = $request->get('CorreoElectronico_proveedor');
    $Proveedores->RazonSocual_Proveedor = $request->get('RazonSocual_Proveedor');
    $Proveedores->condicion = '1';
    $Proveedores->save();
    return Redirect::to('Administrador/View_Proveedores');
  }

  public function show($id)
  {
    return view("Administrador.View_Proveedores.show", ["Proveedores" => Proveedores::findOrFail($id)]);
  }

  public function edit($id)
  {
    $Proveedores= Proveedores::findOrFail($id);
    return view('Administrador.View_Proveedores.edit', ["Proveedores" => $Proveedores]);
  }

  public function update(ProveedoresFormRequest $request, $id)
  {
    $Proveedores = Proveedores::findOrFail($id);
    $Proveedores->Nombre_proveedor = $request->get('Nombre_proveedor');
    $Proveedores->CorreoElectronico_proveedor = $request->get('CorreoElectronico_proveedor');
    $Proveedores->RazonSocual_Proveedor = $request->get('RazonSocual_Proveedor');
    $Proveedores->update();
    return Redirect::to('Administrador/View_Proveedores');
  }

  public function destroy($id)
  {
    /*$Proveedores = Proveedores::findOrFail($id);
    $Proveedores->condicion = "0";
    $Proveedores->update();
    return Redirect::to('Administrador.View_Proveedores');
 */
    
    $Proveedores = Proveedores::findOrFail($id);
    $Proveedores->delete();
    return redirect()
    ->route('View_Proveedores.index')
    ->with('message', 'se ha eliminado correctamente');
  }
}