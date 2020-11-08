<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table='proveedores';
    protected $primaryKey = 'ID_Proveedores';
    public $timestamps=false;
    protected $fillable=[
        'Nombre_proveedor',
        'CorreoElectronico_proveedor',
        'RazonSocual_Proveedor'
    ];
}
