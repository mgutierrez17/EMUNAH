<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaPrecioProducto extends Model
{
    protected $table = 'lista_precios_productos';

    protected $fillable = [
        'lista_precio_id',
        'producto_id',
        'precio',
    ];

    public function listaPrecio()
    {
        return $this->belongsTo(ListaPrecio::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
