<div class="container">
    <div class="normal-table-list">
        <div class="basic-tb-hd">
            <h2>Gestión de Almacenes</h2>
            <p>Administra tus almacenes desde aquí</p>
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($crearFormulario)
            <button wire:click="cancelar" class="btn btn-danger notika-btn-danger mb-3">
                <i class="notika-icon notika-close"></i> Cancelar
            </button>
        @else
            <button wire:click="$set('crearFormulario', true)" class="btn btn-primary notika-btn-primary mb-3">
                <i class="notika-icon notika-plus"></i> Crear Almacén
            </button>
        @endif


        @if ($crearFormulario)
            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-house"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model="nom_almacen" type="text" class="form-control"
                                    placeholder="Nombre del Almacén">
                                @error('nom_almacen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-map"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model="direccion_almacen" type="text" class="form-control"
                                    placeholder="Dirección del Almacén">
                                @error('direccion_almacen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button class="btn btn-success notika-btn-success waves-effect">
                            {{ $modoEdicion ? 'Actualizar Almacén' : 'Guardar Almacén' }}
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
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Registrado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($almacenes as $index => $almacen)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $almacen->nom_almacen }}</td>
                            <td>{{ $almacen->direccion_almacen }}</td>
                            <td>{{ $almacen->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <button wire:click="editar({{ $almacen->id }})"
                                    class="btn btn-warning notika-btn-warning btn-sm">
                                    <i class="notika-icon notika-edit"></i>
                                </button>

                                <button wire:click="eliminar({{ $almacen->id }})"
                                    class="btn btn-danger notika-btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este almacén?')">
                                    <i class="notika-icon notika-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay almacenes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
