<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuiaIngresoDetalle extends Model
{
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function guiaIngreso()
    {
        return $this->belongsTo(GuiaIngreso::class);
    }
}
