<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen_Producto extends Model
{
    //
    protected $table = 'almacen_productos'; // nombre real de tu tabla

    protected $fillable = [
        'almacen_id',
        'producto_id',
        'stock',
        'cantidad_optima',
        'cantidad_minima',
        'ubicacion',
    ];
}
