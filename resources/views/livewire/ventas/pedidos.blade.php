<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="normal-table-list">
        <div class="basic-tb-hd">
            <h2>Gestión de Pedidos</h2>
        </div>

        <div class="text-right mb-3">
            @if ($crearFormulario)
                @if (!$modoLectura)
                    <button wire:click="cancelar" class="btn btn-danger notika-btn-danger">
                        <i class="notika-icon notika-close"></i> Cancelar
                    </button>
                @endif
            @else
                <button wire:click="$set('crearFormulario', true)" class="btn btn-primary notika-btn-primary">
                    <i class="notika-icon notika-plus"></i> Crear Pedido
                </button>
            @endif
            @if ($modoLectura)
                <div class="text-center mt-3">
                    <button wire:click="cancelar" class="btn btn-default notika-btn-danger">
                        <i class="notika-icon notika-left-arrow"></i> Volver
                    </button>
                </div>
            @endif
            @if ($modoLectura)
                <div class="text-center mt-3">
                    <a href="{{ route('pedidos.pdf', $pedido_id) }}" target="_blank"
                        class="btn btn-default notika-btn-default">
                        <i class="notika-icon notika-sent"></i> Descargar PDF del Pedido
                    </a>
                </div>
            @endif

        </div>

        @if ($crearFormulario)
            <form wire:submit.prevent="guardar">
                <div class="row">
                    <div class="col-md-6">
                        <label>Cliente</label>
                        <select wire:model="cliente_id" class="form-control" {{ $modoLectura ? 'readonly' : '' }}>
                            <option value="">-- Seleccione --</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nom_cliente }}</option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label>Fecha Pedido</label>
                        <input type="date" wire:model="fecha_pedido" class="form-control"
                            {{ $modoLectura ? 'readonly' : '' }}>
                        @error('fecha_pedido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label>Fecha Entrega</label>
                        <input type="date" wire:model="fecha_entrega" class="form-control"
                            {{ $modoLectura ? 'readonly' : '' }}>
                        @error('fecha_entrega')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label>Descripción del Pedido</label>
                        <input type="text" wire:model="descripcion_pedido" class="form-control"
                            {{ $modoLectura ? 'readonly' : '' }}>
                        @error('descripcion_pedido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Comentarios</label>
                        <textarea wire:model="comentarios" class="form-control" placeholder="Notas adicionales..."
                            {{ $modoLectura ? 'readonly' : '' }}></textarea>
                        @error('comentarios')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4>Productos</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $index => $producto_id)
                                        <tr>
                                            <td>
                                                <select wire:model="productos.{{ $index }}"
                                                    wire:change="actualizarLinea({{ $index }})"
                                                    class="form-control" {{ $modoLectura ? 'disabled' : '' }}>
                                                    <option value="">-- Seleccione --</option>
                                                    @foreach ($productosLista as $producto)
                                                        <option value="{{ $producto->id }}">
                                                            {{ $producto->nom_producto }}</option>
                                                    @endforeach
                                                </select>
                                                @error("productos.$index")
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="number" wire:model.lazy="cantidades.{{ $index }}"
                                                    wire:change="actualizarLinea({{ $index }})"
                                                    {{ $modoLectura ? 'readonly' : '' }} class="form-control"
                                                    min="1" placeholder="Cantidad">
                                                @error("cantidades.$index")
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    value="Bs {{ number_format($precios[$index] ?? 0, 2) }}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    value="Bs {{ number_format($subtotales[$index] ?? 0, 2) }}"
                                                    readonly>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right">
                            <h4>Total: Bs {{ number_format($totalPedido, 2) }}</h4>
                        </div>

                        @if (!$modoLectura)
                            <div class="text-right">
                                <button type="button" wire:click="agregarProducto"
                                    class="btn btn-success notika-btn-success">
                                    <i class="notika-icon notika-plus"></i> Añadir Producto
                                </button>
                            </div>
                        @endif

                    </div>
                </div>

                @if (!$modoLectura)
                    <div class="text-center mt-3">
                        <button class="btn btn-primary notika-btn-primary" type="submit">
                            <i class="notika-icon notika-checked"></i> Guardar Pedido
                        </button>
                    </div>
                @endif

            </form>
            <hr>
        @endif
        <BR></BR>
        <div class="basic-tb-hd">
            <h2>Pedidos registrados recientemente</h2>
        </div>

        <div class="bsc-tbl">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha Registro</th>
                        <th>Fecha Entrega</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $index => $pedido)
                        <tr>
                            <td>{{ $pedidos->firstItem() + $index }}</td>
                            <td>{{ $pedido->cliente->nom_cliente }}<br>
                                <small class="text-muted">{{ $pedido->descripcion_pedido }}</small>
                            </td>
                            <td>{{ $pedido->fecha_registro }}</td>
                            <td>{{ $pedido->fecha_entrega }}</td>
                            <td>{{ number_format($pedido->total_pedido, 2) }}</td>
                            <td>
                                <span
                                    class="label {{ $pedido->estado_pedido === 'pedido' ? 'label-warning' : 'label-success' }}">
                                    {{ ucfirst($pedido->estado_pedido) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button wire:click="ver({{ $pedido->id }})"
                                    class="btn btn-info notika-btn-info btn-sm" title="Ver Detalles">
                                    <i class="notika-icon notika-eye"></i>
                                </button>
                                @if (!in_array($pedido->estado_pedido, ['entregado', 'facturado']))
                                    <button wire:click="editar({{ $pedido->id }})"
                                        class="btn btn-warning notika-btn-warning btn-sm" title="Editar">
                                        <i class="notika-icon notika-edit"></i>
                                    </button>
                                @endif
                                @if ($pedido->estado_pedido !== 'facturado')
                                    <button wire:click="cambiarEstado({{ $pedido->id }})"
                                        class="btn btn-primary notika-btn-primary btn-sm" title="Cambiar Estado">
                                        <i class="notika-icon notika-refresh"></i>
                                    </button>
                                @endif
                                @if (!in_array($pedido->estado_pedido, ['entregado', 'facturado']))
                                    <button wire:click="eliminar({{ $pedido->id }})"
                                        onclick="return confirm('¿Estás seguro?')"
                                        class="btn btn-danger notika-btn-danger btn-sm" title="Eliminar">
                                        <i class="notika-icon notika-trash"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay pedidos registrados.</td>
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
