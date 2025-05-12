<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Productos</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Reporte de Productos por Almacén</h3>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Almacén</th>
                <th>Stock</th>
                <th>Óptima</th>
                <th>Mínima</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->codigo_venta }}</td>
                    <td>{{ $item->nom_producto }}</td>
                    <td>{{ $item->nom_almacen }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->cantidad_optima }}</td>
                    <td>{{ $item->cantidad_minima }}</td>
                    <td>{{ $item->ubicacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
