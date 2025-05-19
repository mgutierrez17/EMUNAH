<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .info {
            margin-bottom: 20px;
        }

        .info td {
            padding: 4px 8px;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>
            @if ($pedido->estado_pedido === 'pedido')
                PEDIDO CLIENTE
            @elseif ($pedido->estado_pedido === 'entregado')
                NOTA DE ENTREGA
            @elseif ($pedido->estado_pedido === 'facturado')
                FACTURA
            @else
                DOCUMENTO
            @endif
        </h2>
        <p>Fecha: {{ \Carbon\Carbon::parse($pedido->fecha_registro)->format('d/m/Y') }}</p>
        <p>Fecha Entrega: {{ \Carbon\Carbon::parse($pedido->fecha_entrega)->format('d/m/Y') }}</p>
    </div>

    <table class="info">
        <tr>
            <td><strong>Cliente:</strong> {{ $pedido->cliente->nom_cliente }}</td>
            <td><strong>NIT:</strong> {{ $pedido->cliente->nit }}</td>
        </tr>
        <tr>
            <td><strong>Dirección:</strong> {{ $pedido->cliente->direccion }}</td>
            <td><strong>Teléfono:</strong> {{ $pedido->cliente->telefono }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Descripción:</strong> {{ $pedido->descripcion_pedido }}</td>
        </tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 10%">Cant</th>
                <th style="width: 50%">Producto</th>
                <th style="width: 20%">Precio Unitario</th>
                <th style="width: 20%">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido->productos as $producto)
                <tr>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ $producto->nom_producto }}</td>
                    <td>Bs {{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                    <td>Bs {{ number_format($producto->pivot->cantidad * $producto->pivot->precio_unitario, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total del pedido: Bs {{ number_format($pedido->total_pedido, 2) }}
    </div>

    <p><strong>Comentarios:</strong> {{ $pedido->comentarios }}</p>
</body>

</html>
