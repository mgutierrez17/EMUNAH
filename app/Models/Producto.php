<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = ['nom_producto', 'codigo_venta', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
