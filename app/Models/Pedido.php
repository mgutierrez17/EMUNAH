<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedidos';
    protected $fillable = [
        'cliente_id',
        'descripcion_pedido',  // ✅ nuevo
        'fecha_registro',
        'fecha_entrega',
        'estado_pedido',
        'total_pedido',
        'descuento_pedido',
        'comentarios',         // ✅ nuevo
        'lista_precio_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_productos')
            ->withPivot('cantidad', 'precio_unitario', 'precio_total')
            ->withTimestamps();
    }
}
