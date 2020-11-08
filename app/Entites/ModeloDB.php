<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloDB extends Model
{
    protected $table='categorias_pro';
    protected $primarykey = 'ID_Categorias_Pro';
    public $timestamps=false;
    protected $fillable=[
        'categoria',
        'Nombre',
        'condicion'
    ];
}
