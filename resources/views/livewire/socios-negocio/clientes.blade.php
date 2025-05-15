<div class="container">
    {{-- ALERTAS --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- BOTÓN CREAR/CANCELAR --}}
    <div class="row mb-3">
        <div class="col-md-12 text-right">
            @if ($crearFormulario)
                <button wire:click="cancelar" class="btn btn-danger notika-btn-danger">
                    <i class="notika-icon notika-close"></i> Cancelar
                </button>
            @else
                <button wire:click="$set('crearFormulario', true)" class="btn btn-primary notika-btn-primary">
                    <i class="notika-icon notika-plus"></i> Crear Cliente
                </button>
            @endif
        </div>
    </div>

    {{-- FORMULARIO --}}
    @if ($crearFormulario)
        <div class="form-element-list">
            <form wire:submit.prevent="{{ $modoEdicion ? 'actualizar' : 'guardar' }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-support"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="nom_cliente" type="text" class="form-control" placeholder="Nombre del cliente">
                                @error('nom_cliente') <small class="text-danger">{{ $message }}</small> @enderror
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
                                @error('nit') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-map"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="direccion" type="text" class="form-control" placeholder="Dirección">
                                @error('direccion') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-phone"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="telefono" type="text" class="form-control" placeholder="Teléfono">
                                @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-mail"></i>
                            </div>
                            <div class="nk-int-st">
                                <input wire:model.defer="correo" type="email" class="form-control" placeholder="Correo electrónico">
                                @error('correo') <small class="text-danger">{{ $message }}</small> @enderror
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

    {{-- TABLA --}}
    <div class="normal-table-list mt-4">
        <div class="basic-tb-hd">
            <h2>Lista de Clientes</h2>
        </div>
        <div class="bsc-tbl">
            <table class="table table-hover table-bordered">
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
                    @forelse ($clientes as $c)
                        <tr>
                            <td>{{ $c->nom_cliente }}</td>
                            <td>{{ $c->nit }}</td>
                            <td>{{ $c->direccion }}</td>
                            <td>{{ $c->telefono }}</td>
                            <td>{{ $c->correo }}</td>
                            <td>
                                <span class="label {{ $c->estado ? 'label-success' : 'label-danger' }}">
                                    {{ $c->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button wire:click="editar({{ $c->id }})" class="btn btn-warning notika-btn-warning btn-sm">
                                    <i class="notika-icon notika-edit"></i>
                                </button>
                                <button wire:click="eliminar({{ $c->id }})" class="btn btn-danger notika-btn-danger btn-sm">
                                    <i class="notika-icon notika-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay clientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center mt-2">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>
</div>
