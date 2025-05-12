<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'nom_almacen' => 'required|string|max:50',
            'direccion_almacen' => 'required|string|max:200',
        ]);

        Almacen::create([
            'nom_almacen' => $request->nom_almacen,
            'direccion_almacen' => $request->direccion_almacen,
        ]);

        return redirect()->back()->with('success', 'Almacén registrado correctamente.');
    }
}
