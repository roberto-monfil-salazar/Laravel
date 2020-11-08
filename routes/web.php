<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('almacen/view_Categorias_pro','Categorias_proController');
Route::resource('Administrador/View_Usuarios','UsuariosController');
Route::resource('Administrador/View_Proveedores','ProveedoresController');
Route::resource('Administrador/View_Telefonos_usuarios','Telefonos_usuariosController');
