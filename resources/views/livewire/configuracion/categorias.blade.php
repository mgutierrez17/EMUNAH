<div class="container">
    <div class="normal-table-list">
        <div class="basic-tb-hd">
            <h2>Gestión de Categorías de Productos</h2>
            <p>Administra tus categorías de productos aquí.</p>
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
                <i class="notika-icon notika-plus"></i> Crear Categoría
            </button>
        @endif

        @if ($crearFormulario)
            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-edit"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model="nom_categoria" type="text" class="form-control"
                                    placeholder="Nombre de Categoría"
                                    style="position: relative; z-index: 9999; background: #fff;">
                                @error('nom_categoria')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
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
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $index => $cat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cat->nom_categoria }}</td>
                            <td class="text-center">
                                <button wire:click="editar({{ $cat->id }})"
                                    class="btn btn-warning notika-btn-warning btn-sm">
                                    <i class="notika-icon notika-edit"></i>
                                </button>
                                <button wire:click="eliminar({{ $cat->id }})"
                                    class="btn btn-danger notika-btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar esta categoría?')">
                                    <i class="notika-icon notika-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay categorías registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
