<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends model {
	protected $table='Usuarios';
    protected $primaryKey = 'ID_Usuarios';
    public $timestamps=false;
    protected $fillable=[
    	'Nombre_Usuario',
    	'Apellido_Pa_Usuario',
    	'Apellido_Ma_Usuario',
    	'Edad',
    	'Sexo',
    	'UserNme',
    	'Psswr'
    ];
 
} 