<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuiaIngreso extends Model
{
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detalles()
    {
        return $this->hasMany(GuiaIngresoDetalle::class);
    }
}
