<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    public function generarPDF($id)
    {
        $pedido = Pedido::with(['cliente', 'productos'])->findOrFail($id);

        $pdf = Pdf::loadView('reportes.pdf.pedido', compact('pedido'));

        return $pdf->stream('pedido_' . $pedido->id . '.pdf');
    }
}
