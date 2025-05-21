<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nom_producto', 'codigo_venta', 'categoria_id'];

    public function listasPrecio()
    {
        return $this->belongsToMany(ListaPrecio::class, 'lista_precios_productos')
            ->withPivot('precio')
            ->withTimestamps();
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
