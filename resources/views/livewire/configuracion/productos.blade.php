<div class="container">
    <div class="normal-table-list">
        <div class="basic-tb-hd">
            <h2>Gestión de Productos</h2>
            <p>Administra tus productos relacionados con categorías.</p>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($crearFormulario)
            <button wire:click="cancelar" class="btn btn-danger notika-btn-danger mb-3">
                <i class="notika-icon notika-close"></i> Cancelar
            </button>
        @else
            <button wire:click="$set('crearFormulario', true)" class="btn btn-primary notika-btn-primary mb-3">
                <i class="notika-icon notika-plus"></i> Crear Producto
            </button>
        @endif

        @if ($crearFormulario)
            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <div class="row">
                    <div class="col-md-4">
                        <input wire:model="nom_producto" type="text" class="form-control"
                            placeholder="Nombre del producto">
                        @error('nom_producto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <input wire:model="codigo_venta" type="text" class="form-control"
                            placeholder="Código de venta">
                        @error('codigo_venta')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <select wire:model="categoria_id" class="form-control">
                            <option value="">-- Categoría --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nom_categoria }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-2 text-center">
                        <button class="btn btn-success notika-btn-success">
                            {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>
                </div>
            </form>
        @endif

        <div class="bsc-tbl mt-4">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Código</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->nom_producto }}</td>
                            <td>{{ $p->codigo_venta }}</td>
                            <td>{{ $p->categoria->nom_categoria }}</td>
                            <td class="text-center">
                                <button wire:click="ver({{ $p->id }})" class="btn btn-info btn-sm">
                                    <i class="notika-icon notika-eye"></i>
                                </button>
                                <button wire:click="editar({{ $p->id }})" class="btn btn-warning btn-sm">
                                    <i class="notika-icon notika-edit"></i>
                                </button>
                                <button wire:click="eliminar({{ $p->id }})" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar producto?')">
                                    <i class="notika-icon notika-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center mt-3">
                {{ $productos->links() }}
            </div>
            <div class="text-center mt-2">
                Página {{ $productos->currentPage() }} de {{ $productos->lastPage() }}
            </div>

        </div>
    </div>

    @if ($mostrarModal)
        <div class="modal fade in" style="display:block; background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" wire:click="$set('mostrarModal', false)">&times;</button>
                        <h4 class="modal-title">
                            {{ $detalleProducto->nom_producto }}
                        </h4>
                        <div class="row" style="padding: 0 20px 10px 20px;">
                            <div class="col-md-6 text-left">
                                <div style="font-size: 16px;">
                                    <strong>Categoría:</strong> {{ $detalleProducto->categoria->nom_categoria }}
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div style="font-size: 16px;">
                                    <strong>Código:</strong> {{ $detalleProducto->codigo_venta }}
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Almacén</th>
                                    <th>Stock</th>
                                    <th>Óptima</th>
                                    <th>Mínima</th>
                                    <th>Ubicación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalleAlmacenes as $a)
                                    <tr>
                                        <td>{{ $a->nom_almacen }}</td>
                                        <td>{{ $a->stock }}</td>
                                        <td>{{ $a->cantidad_optima }}</td>
                                        <td>{{ $a->cantidad_minima }}</td>
                                        <td>{{ $a->ubicacion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="$set('mostrarModal', false)" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
