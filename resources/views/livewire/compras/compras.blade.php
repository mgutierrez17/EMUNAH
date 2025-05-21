<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h3>Registrar Guía de Ingreso</h3>

    @if (!$modoFormulario)
    <div class="text-right mb-3">
        <button wire:click="mostrarFormulario" class="btn btn-primary notika-btn-primary">
            <i class="notika-icon notika-plus"></i> Crear Guía de Ingreso
        </button>
    </div>
    @endif

    @if ($modoFormulario)
    <form wire:submit.prevent="guardarGuiaIngreso">
        <div class="row">
            <!-- Descripción -->
            <div class="col-md-6">
                <label>Descripción:</label>
                @if ($modoLectura)
                <p class="form-control-static">{{ $descripcion_ingreso }}</p>
                @else
                <input type="text" class="form-control" wire:model="descripcion_ingreso">
                @endif
            </div>

            <!-- Fecha Pedido -->
            <div class="col-md-3">
                <label>Fecha Pedido:</label>
                @if ($modoLectura)
                <p class="form-control-static">{{ $fecha_pedido }}</p>
                @else
                <input type="date" class="form-control" wire:model="fecha_pedido">
                @endif
            </div>

            <!-- Fecha Ingreso -->
            <div class="col-md-3">
                <label>Fecha Ingreso:</label>
                @if ($modoLectura)
                <p class="form-control-static">{{ $fecha_ingreso }}</p>
                @else
                <input type="date" class="form-control" wire:model="fecha_ingreso">
                @endif
            </div>

            <!-- Proveedor -->
            <div class="col-md-6 mt-3">
                <label>Proveedor:</label>
                @if ($modoLectura)
                <p class="form-control-static">
                    {{ optional($proveedores->find($proveedor_id))->nom_proveedor }}
                </p>
                @else
                <select class="form-control" wire:model="proveedor_id">
                    <option value="">-- Seleccione --</option>
                    @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nom_proveedor }}</option>
                    @endforeach
                </select>
                @endif
            </div>
            <div class="col-md-6 mt-3">
                <label>Estado:</label>
                @if ($modoLectura)
                <p class="form-control-static">
                    <span class="label 
                {{ $estado_ingreso === 'Pendiente' ? 'label-warning' : 
                   ($estado_ingreso === 'Completado' ? 'label-success' : 'label-danger') }}">
                        {{ ucfirst($estado_ingreso) }}
                    </span>
                </p>
                @else
                <select wire:model="estado_ingreso" class="form-control">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Completado">Completado</option>
                    <option value="Anulado">Anulado</option>
                </select>
                @endif
            </div>
            <div class="col-md-12 mt-3">
                <label>Comentario:</label>
                @if ($modoLectura)
                <p class="form-control-static">{{ $comentario }}</p>
                @else
                <textarea wire:model="comentario" class="form-control" {{ $modoLectura ? 'readonly' : '' }}></textarea>
                @endif
            </div>
        </div>
        <hr>
        <h4>Detalle de productos</h4>
        <div class="table-responsive">
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $index => $detalle)
                    <tr>
                        <td>
                            @if ($modoLectura)
                            {{ optional($productos->find($detalle['producto_id']))->nom_producto }}
                            @else
                            <select class="form-control" wire:model="detalles.{{ $index }}.producto_id">
                                <option value="">-- Seleccione --</option>
                                @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nom_producto }}</option>
                                @endforeach
                            </select>
                            @endif
                        </td>

                        <td>
                            @if ($modoLectura)
                            {{ number_format($detalle['precio_unitario'], 2) }}
                            @else
                            <input type="number" step="0.01" class="form-control" wire:model="detalles.{{ $index }}.precio_unitario">
                            @endif
                        </td>

                        <td>
                            <input type="number" class="form-control"
                                wire:model.lazy="detalles.{{ $index }}.cantidad" {{ $modoLectura ? 'readonly' : '' }}>
                        </td>
                        <td>
                            {{ number_format(($detalle['precio_unitario'] ?? 0) * ($detalle['cantidad'] ?? 0), 2) }}
                        </td>

                        <td>
                            <button type="button" class="btn btn-danger btn-sm"
                                wire:click="eliminarDetalle({{ $index }})">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (!$modoLectura)
        <button type="button" class="btn btn-secondary" wire:click="agregarDetalle">Agregar Producto</button>
        @endif
        <div class="mt-3 row">
            <div class="col-md-4">
                <label>Descuento:</label>
                <input type="number" step="0.01" class="form-control" wire:model="descuento_ingreso" {{ $modoLectura ? 'readonly' : '' }}>
            </div>
            <div class="col-md-4 offset-md-4 text-right mt-4">
                <h5>Total: <strong>{{ number_format($total_ingreso, 2) }}</strong></h5>
            </div>
        </div>

        <div class="text-center mt-4">
            @if ($modoLectura)
            <!-- No se muestra ningún botón -->
            @elseif ($modoEdicion)
            <button type="submit" class="btn btn-warning notika-btn-warning">
                <i class="notika-icon notika-edit"></i> Actualizar Guía
            </button>
            @else
            <button type="submit" class="btn btn-primary notika-btn-primary">
                <i class="notika-icon notika-checked"></i> Guardar Guía de Ingreso
            </button>
            @endif

            <button type="button" wire:click="cancelar" class="btn btn-default notika-btn-default">
                <i class="notika-icon notika-left-arrow"></i> Cancelar
            </button>
        </div>

    </form>
    @endif

    <hr>
    <h4 class="mt-4">Guías de Ingreso Registradas</h4>

    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Proveedor</th>
                    <th>Fecha Ingreso</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ingresos as $index => $ingreso)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ingreso->proveedor->nom_proveedor ?? 'N/D' }}</td>
                    <td>{{ $ingreso->fecha_ingreso }}</td>
                    <td>Bs {{ number_format($ingreso->total_ingreso, 2) }}</td>
                    <td>
                        <span
                            class="label {{ $ingreso->estado_ingreso === 'Pendiente' ? 'label-warning' : ($ingreso->estado_ingreso === 'Completado' ? 'label-success' : 'label-danger') }}">
                            {{ ucfirst($ingreso->estado_ingreso) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <button wire:click="ver({{ $ingreso->id }})" class="btn btn-info btn-sm">
                            <i class="notika-icon notika-eye"></i>
                        </button>
                        <button wire:click="editar({{ $ingreso->id }})" class="btn btn-warning btn-sm">
                            <i class="notika-icon notika-edit"></i>
                        </button>
                        <button wire:click="cambiarEstado({{ $ingreso->id }})" class="btn btn-primary btn-sm">
                            <i class="notika-icon notika-refresh"></i>
                        </button>
                        <button wire:click="eliminar({{ $ingreso->id }})"
                            onclick="return confirm('¿Eliminar ingreso?')" class="btn btn-danger btn-sm">
                            <i class="notika-icon notika-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay registros aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>