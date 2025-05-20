<div class="container">
    <h3>Registrar Guía de Ingreso</h3>

    <form wire:submit.prevent="guardarGuiaIngreso">
        <div class="row">
            <div class="col-md-6">
                <label>Descripción:</label>
                <input type="text" class="form-control" wire:model="descripcion_ingreso">
            </div>

            <div class="col-md-3">
                <label>Fecha Pedido:</label>
                <input type="date" class="form-control" wire:model="fecha_pedido">
            </div>

            <div class="col-md-3">
                <label>Fecha Ingreso:</label>
                <input type="date" class="form-control" wire:model="fecha_ingreso">
            </div>

            <div class="col-md-6">
                <label>Proveedor:</label>
                <select class="form-control" wire:model="proveedor_id">
                    <option value="">-- Seleccione --</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label>Estado:</label>
                <select class="form-control" wire:model="estado_ingreso">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Completado">Completado</option>
                    <option value="Anulado">Anulado</option>
                </select>
            </div>

            <div class="col-md-12 mt-3">
                <label>Comentario:</label>
                <textarea class="form-control" wire:model="comentario"></textarea>
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
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $index => $detalle)
                        <tr>
                            <td>
                                <select class="form-control" wire:model="detalles.{{ $index }}.producto_id">
                                    <option value="">-- Seleccione --</option>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->nom_producto }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" step="0.01" class="form-control" wire:model="detalles.{{ $index }}.precio_unitario">
                            </td>
                            <td>
                                <input type="number" class="form-control" wire:model="detalles.{{ $index }}.cantidad">
                            </td>
                            <td>
                                {{ number_format($detalle['precio_unitario'] * $detalle['cantidad'], 2) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" wire:click="eliminarDetalle({{ $index }})">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-secondary" wire:click="agregarDetalle">Agregar Producto</button>

        <div class="mt-3">
            <label>Descuento:</label>
            <input type="number" step="0.01" class="form-control w-25" wire:model="descuento_ingreso">

            <h5 class="mt-2">Total: <strong>{{ number_format($total_ingreso, 2) }}</strong></h5>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Guía de Ingreso</button>
    </form>
</div>
