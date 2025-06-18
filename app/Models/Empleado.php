<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 'nombre', 'apellido', 'telefono', 'direccion', 'correo',
        'nro_carnet', 'fecha_nacimiento', 'fecha_contratacion', 'almacen_id', 'area_id', 'foto'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
