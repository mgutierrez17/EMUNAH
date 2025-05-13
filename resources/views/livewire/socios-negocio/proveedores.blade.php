<div class="container">
    {{-- ALERTAS --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error') }}
        </div>
    @endif


    {{-- Botón de acción --}}
    <div class="row mb-3">
        <div class="col-md-12 text-right">
            @if ($crearFormulario)
                <button wire:click="cancelar" class="btn btn-danger notika-btn-danger">
                    <i class="notika-icon notika-close"></i> Cancelar
                </button>
            @else
                <button wire:click="$set('crearFormulario', true)" class="btn btn-primary notika-btn-primary">
                    <i class="notika-icon notika-plus"></i> Crear Proveedor
                </button>
            @endif
        </div>
    </div>

    {{-- Formulario --}}
    @if ($crearFormulario)
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>{{ $modoEdicion ? 'Editar Proveedor' : 'Registrar Nuevo Proveedor' }}</h2>
                <p>Llena los campos para {{ $modoEdicion ? 'actualizar' : 'crear' }} un proveedor.</p>
            </div>

            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-support"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="nom_proveedor" type="text" class="form-control"
                                    placeholder="Nombre del proveedor">
                                @error('nom_proveedor')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-edit"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="nit" type="text" class="form-control" placeholder="NIT">
                                @error('nit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-map"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="direccion" type="text" class="form-control"
                                    placeholder="Dirección">
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-phone"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="telefono" type="text" class="form-control"
                                    placeholder="Teléfono">
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-mail"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="correo" type="email" class="form-control"
                                    placeholder="Correo electrónico">
                                @error('correo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <label><input type="checkbox" wire:model.defer="estado"> Activo</label>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-success notika-btn-success">
                            <i class="notika-icon {{ $modoEdicion ? 'notika-edit' : 'notika-success' }}"></i>
                            {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    {{-- Tabla de proveedores --}}
    <div class="normal-table-list mt-4">
        <div class="basic-tb-hd">
            <h2>Lista de Proveedores</h2>
        </div>
        <div class="bsc-tbl">
            <table class="table table-sc-ex">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>NIT</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $p)
                        <tr>
                            <td>{{ $p->nom_proveedor }}</td>
                            <td>{{ $p->nit }}</td>
                            <td>{{ $p->direccion }}</td>
                            <td>{{ $p->telefono }}</td>
                            <td>{{ $p->correo }}</td>
                            <td>
                                <span class="label {{ $p->estado ? 'label-success' : 'label-danger' }}">
                                    {{ $p->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button wire:click="editar({{ $p->id }})"
                                    class="btn btn-warning notika-btn-warning btn-sm">
                                    <i class="notika-icon notika-edit"></i>
                                </button>
                                <button wire:click="eliminar({{ $p->id }})"
                                    class="btn btn-danger notika-btn-danger btn-sm">
                                    <i class="notika-icon notika-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination mt-3 text-center">
                {{ $proveedores->links() }}
            </div>
            <div class="text-right text-muted">
                Página {{ $proveedores->currentPage() }} de {{ $proveedores->lastPage() }}
            </div>

        </div>
    </div>
</div>
