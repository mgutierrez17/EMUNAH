<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedores';

    protected $fillable = [
        'nom_proveedor',
        'nit',
        'direccion',
        'telefono',
        'estado',
        'correo',
    ];
}
