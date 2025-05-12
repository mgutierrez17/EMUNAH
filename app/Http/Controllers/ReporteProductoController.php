<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteProductosExport;

class ReporteProductoController extends Controller
{
    public function index(Request $request)
    {
        $almacenes = Almacen::all();
        $datos = [];

        if ($request->filled('almacen_id')) {
            $query = DB::table('almacen_productos')
                ->join('productos', 'productos.id', '=', 'almacen_productos.producto_id')
                ->join('almacenes', 'almacenes.id', '=', 'almacen_productos.almacen_id')
                ->where('almacen_productos.almacen_id', $request->almacen_id)
                ->select(
                    'productos.codigo_venta',
                    'productos.nom_producto',
                    'almacenes.nom_almacen',
                    'almacen_productos.stock',
                    'almacen_productos.cantidad_optima',
                    'almacen_productos.cantidad_minima',
                    'almacen_productos.ubicacion'
                )
                ->orderBy('productos.nom_producto');

            if ($request->filled('stock_critico')) {
                $query->whereColumn('almacen_productos.stock', '<', 'almacen_productos.cantidad_minima');
            }

            $datos = $query->get();
        }

        return view('modulos.inventario.reporte_productos', compact('almacenes', 'datos'));
    }

    public function exportarPDF(Request $request)
    {
        $almacen_id = $request->input('almacen_id');

        $query = DB::table('almacen_productos')
            ->join('productos', 'productos.id', '=', 'almacen_productos.producto_id')
            ->join('almacenes', 'almacenes.id', '=', 'almacen_productos.almacen_id')
            ->where('almacen_productos.almacen_id', $request->almacen_id)
            ->select(
                'productos.codigo_venta',
                'productos.nom_producto',
                'almacenes.nom_almacen',
                'almacen_productos.stock',
                'almacen_productos.cantidad_optima',
                'almacen_productos.cantidad_minima',
                'almacen_productos.ubicacion'
            )
            ->orderBy('productos.nom_producto');

        if ($request->filled('stock_critico')) {
            $query->whereColumn('almacen_productos.stock', '<', 'almacen_productos.cantidad_minima');
        }

        $datos = $query->get();


        $pdf = Pdf::loadView('reportes.pdf.reporte_productos', compact('datos'));

        return $pdf->download('reporte_productos.pdf');
    }

    public function exportarExcel(Request $request)
    {
        return Excel::download(new ReporteProductosExport($request->input('almacen_id')), 'reporte_productos.xlsx');
    }
}
