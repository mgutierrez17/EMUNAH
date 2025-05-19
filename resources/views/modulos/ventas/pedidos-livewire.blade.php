<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="normal-table-list">
        <div class="basic-tb-hd">
            <h2>Gestión de Pedidos</h2>
            <p>Pedidos registrados recientemente</p>
        </div>

        <div class="text-right mb-3">
            <button wire:click="$toggle('crearFormulario')" class="btn btn-primary notika-btn-primary">
                {{ $crearFormulario ? 'Cancelar' : 'Crear Pedido' }}
            </button>
        </div>

        @if ($crearFormulario)
            @include('modulos.ventas.partials.formulario-pedido')
        @endif

        <div class="bsc-tbl">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $index => $pedido)
                        <tr>
                            <td>{{ $pedidos->firstItem() + $index }}</td>
                            <td>{{ $pedido->cliente->nom_cliente }}</td>
                            <td>{{ $pedido->fecha_registro }}</td>
                            <td>{{ number_format($pedido->total_pedido, 2) }}</td>
                            <td>
                                <span class="label {{ $pedido->estado_pedido === 'pedido' ? 'label-warning' : 'label-success' }}">
                                    {{ ucfirst($pedido->estado_pedido) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No hay pedidos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="text-center">
                {{ $pedidos->links() }}
            </div>
        </div>
    </div>
</div>
