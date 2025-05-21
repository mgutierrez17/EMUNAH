<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuiaIngreso extends Model
{
    protected $fillable = [
        'descripcion_ingreso',
        'fecha_pedido',
        'fecha_ingreso',
        'estado_ingreso',
        'comentario',
        'total_ingreso',
        'descuento_ingreso',
        'proveedor_id',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detalles()
    {
        return $this->hasMany(GuiaIngresoDetalle::class);
    }
}
