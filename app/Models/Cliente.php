<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_cliente',
        'nit',
        'direccion',
        'telefono',
        'correo',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];
}
