<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Categorias_proFormRequest;
use App\categorias_pro;
class Categorias_proController extends Controller
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
      $Categorias_pro = DB::table('Categorias_pro')->where('Nombre', 'LIKE', '%' . $query . '%')
        ->orderBy('ID_Categorias_Pro', 'ASC')
        ->paginate(7);
      return view('almacen.view_Categorias_pro.index', ["Categorias_pro" => $Categorias_pro, "searchText" => $query]);
      //lo de arriba nos permitira buscar e
    }
  }

  public function create()
  {
    return view("almacen.view_Categorias_pro.create");
  }

  public function store(Categorias_proFormRequest $request)
  {
    $Categorias_pro = new categorias_pro;
    $Categorias_pro->categoria = $request->get('categoria');
    $Categorias_pro->Nombre = $request->get('Nombre');
    $Categorias_pro->condicion = '1';
    $Categorias_pro->save();
    return Redirect::to('almacen/view_Categorias_pro');
  }

  public function show($id)
  {
    return view("almacen.view_Categorias_pro.show", ["Categorias_pro" => categorias_pro::findOrFail($id)]);
  }

  public function edit($id)
  {
    $Categorias_pro= categorias_pro::findOrFail($id);
    return view('almacen.view_Categorias_pro.edit', ["Categorias_pro" => $Categorias_pro]);
  }

  public function update(Categorias_proFormRequest $request, $id)
  {
    $Categorias_pro = categorias_pro::findOrFail($id);
    $Categorias_pro->categoria = $request->get('categoria');
    $Categorias_pro->Nombre = $request->get('Nombre');
    $Categorias_pro->update();
    return Redirect::to('almacen/view_Categorias_pro');
  }

  public function destroy($id)
  {
    /*$Categorias_pro = categorias_pro::findOrFail($id);
    $Categorias_pro->condicion = "0";
    $Categorias_pro->update();
    return Redirect::to('almacen.view_Categorias_pro');
 */
    
    $Categorias_pro = categorias_pro::findOrFail($id);
    $Categorias_pro->delete();
    return redirect()
    ->route('view_Categorias_pro.index')
    ->with('message', 'se ha eliminado correctamente');
  }
}