<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReporteProductosExport implements FromView
{
    protected $almacen_id;

    public function __construct($almacen_id)
    {
        $this->almacen_id = $almacen_id;
    }

    public function view(): View
    {
        $datos = DB::table('almacen_productos')
            ->join('productos', 'productos.id', '=', 'almacen_productos.producto_id')
            ->join('almacenes', 'almacenes.id', '=', 'almacen_productos.almacen_id')
            ->where('almacen_productos.almacen_id', $this->almacen_id)
            ->select(
                'productos.codigo_venta',
                'productos.nom_producto',
                'almacenes.nom_almacen',
                'almacen_productos.stock',
                'almacen_productos.cantidad_optima',
                'almacen_productos.cantidad_minima',
                'almacen_productos.ubicacion'
            )
            ->orderBy('productos.nom_producto')
            ->get();

        return view('reportes.pdf.reporte_productos', compact('datos')); // usamos la misma vista del PDF
    }
}
