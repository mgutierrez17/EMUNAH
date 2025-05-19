<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaPrecio extends Model
{
    protected $table = 'lista_precios';

    protected $fillable = [
        'nom_lista',
        'estado',
        'fecha_inicio',
        'fecha_final',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'lista_precios_productos')
            ->withPivot('precio')
            ->withTimestamps();
    }
}


