<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //
    protected $table = 'almacenes';
    protected $fillable = ['nom_almacen', 'direccion_almacen'];

    public function productos()
    {
        return $this->hasMany(Almacen_Producto::class, 'almacen_id');
    }
}
