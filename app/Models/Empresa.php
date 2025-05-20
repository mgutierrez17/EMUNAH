<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo',
        'nit',
        'logo', 
    ];
}
