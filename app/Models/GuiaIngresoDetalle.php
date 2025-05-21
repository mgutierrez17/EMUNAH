<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuiaIngresoDetalle extends Model
{

    protected $fillable = [
        'guia_ingreso_id',
        'producto_id',
        'precio_unitario',
        'cantidad',
        'precio_total',
        'almacen_id',
    ];
    
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function guiaIngreso()
    {
        return $this->belongsTo(GuiaIngreso::class);
    }
}
