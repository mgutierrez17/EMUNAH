<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaPrecioProducto extends Pivot
{
    protected $table = 'lista_precios_productos';

    protected $fillable = [
        'lista_precio_id',
        'producto_id',
        'precio',
    ];
}
