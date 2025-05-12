<x-home-layout>
    <x-slot name="header">
        <h1>Reporte de Productos por Almacén</h1>
    </x-slot>

    <div class="container">
        {{-- Filtro por almacén --}}
        <form action="{{ route('reporte.productos') }}" method="GET" class="row mb-4">
            {{-- Selección de almacén --}}
            <div class="col-md-6">
                <select name="almacen_id" class="form-control" required>
                    <option value="">-- Seleccione un almacén --</option>
                    @foreach ($almacenes as $a)
                        <option value="{{ $a->id }}" {{ request('almacen_id') == $a->id ? 'selected' : '' }}>
                            {{ $a->nom_almacen }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Checkbox de stock crítico --}}
            <div class="col-md-3 d-flex align-items-center">
                <label class="mb-0">
                    <input type="checkbox" name="stock_critico" {{ request('stock_critico') ? 'checked' : '' }}>
                    Mostrar solo stock crítico
                </label>
            </div>

            {{-- Botón de buscar --}}
            <div class="col-md-3 text-right">
                <button class="btn btn-primary notika-btn-primary">Buscar</button>
            </div>
        </form>


        {{-- Botones de exportación --}}
        @if (request('almacen_id'))
            <div class="mb-3 text-right">
                <a href="{{ route('reporte.productos.pdf', ['almacen_id' => request('almacen_id')]) }}"
                    class="btn btn-danger notika-btn-danger">
                    <i class="notika-icon notika-sent"></i> Exportar PDF
                </a>
                <a href="{{ route('reporte.productos.excel', ['almacen_id' => request('almacen_id')]) }}"
                    class="btn btn-success notika-btn-success">
                    <i class="notika-icon notika-edit"></i> Exportar Excel
                </a>
            </div>
        @endif

        {{-- Tabla de productos --}}
        @if (isset($datos) && count($datos) > 0)
            <div class="normal-table-list">
                <table class="table table-bordered table-hover">
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
                                <td>
                                    {{ $item->stock }}
                                    @if ($item->stock < $item->cantidad_minima)
                                        <span class="label label-danger">Crítico</span>
                                    @endif
                                </td>
                                <td>{{ $item->cantidad_optima }}</td>
                                <td>{{ $item->cantidad_minima }}</td>
                                <td>{{ $item->ubicacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif(request('almacen_id'))
            <div class="alert alert-warning">No hay productos registrados en este almacén.</div>
        @endif
    </div>
</x-home-layout>
