<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefonos_usuarios extends model {
	protected $table='Telefonos_usuarios';
    protected $primaryKey = 'ID_Telefonos_Usuarios';
    protected $foreinKey = 'ID_Usuarios ';
    public $timestamps=false;
    protected $fillable=[
    	'tipoDe_Telefono',
    	'Numero_Telefono',
    	'ID_Usuarios ',
    ];

    public function getUsuariosController(){
        return $this->belongTo('App\Usuarios','ID_Usuarios'.'ID_Usuarios');
    }
 
} 