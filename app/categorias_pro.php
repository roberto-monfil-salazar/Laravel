<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias_pro extends Model
{
    protected $table='categorias_pro';
    protected $primaryKey = 'ID_Categorias_Pro';
    public $timestamps=false;
    protected $fillable=[
        'categoria',
        'Nombre',
        'condicion'
    ];
}
