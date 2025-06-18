<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="text-right mb-3">
        @if ($mostrarFormulario)
        <button type="button" wire:click="$set('mostrarFormulario', false)" class="btn btn-danger notika-btn-danger">
            <i class="notika-icon notika-close"></i> Cancelar
        </button>

        @else
        <button wire:click="$set('mostrarFormulario', true)" class="btn btn-primary notika-btn-primary">
            <i class="notika-icon notika-plus"></i> Crear Empleado
        </button>
        @endif
    </div>

    @if ($mostrarFormulario)
    <form wire:submit.prevent="guardar" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label>Nombre</label>
                <input type="text" wire:model="nombre" class="form-control" />
                @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
                <label>Apellido</label>
                <input type="text" wire:model="apellido" class="form-control" />
                @error('apellido') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Teléfono</label>
                <input type="text" wire:model="telefono" class="form-control" />

            </div>
            <div class="col-md-6">
                <label>Dirección</label>
                <input type="text" wire:model="direccion" class="form-control" />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Correo</label>
                <input type="email" wire:model="correo" class="form-control" />
                @error('correo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
                <label>Carnet de Identidad</label>
                <input wire:model="nro_carnet" type="text" class="form-control" placeholder="Número de carnet">
                @error('nro_carnet') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Fecha de Nacimiento</label>
                <input type="date" wire:model="fecha_nacimiento" class="form-control" />
                @error('fecha_nacimiento') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
                <label>Fecha de Contratación</label>
                <input type="date" wire:model="fecha_contratacion" class="form-control" />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Área</label>
                <select wire:model="area_id" class="form-control">
                    <option value="">Seleccione un área</option>
                    @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
                @error('area_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-md-6">
                <label>Almacén asignado</label>
                <select class="form-control" wire:model="almacen_id">
                    <option value="">-- Seleccione --</option>
                    @foreach ($almacenes as $almacen)
                    <option value="{{ $almacen->id }}">{{ $almacen->nom_almacen }}</option>
                    @endforeach
                </select>
                @error('almacen_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6">
                <label>Usuario asignado</label>
                <select class="form-control" wire:model="user_id">
                    <option value="">-- Seleccione --</option>
                    @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->email }})</option>
                    @endforeach
                </select>
                @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Foto (JPG/PNG)</label>
                <input type="file" wire:model="foto" class="form-control" />
                @if ($foto && is_object($foto))
                <div class="mt-2">
                    <img src="{{ $foto->temporaryUrl() }}" width="120" />
                </div>
                @elseif ($modoEdicion && $foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $foto) }}" width="120" />
                </div>
                @endif
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary notika-btn-primary">
                <i class="notika-icon notika-checked"></i> {{ $modoEdicion ? 'Actualizar' : 'Guardar' }}
            </button>
        </div>
    </form>
    <hr>
    @endif

    <div class="normal-table-list mt-4">
        <div class="basic-tb-hd">
            <h2>Empleados Registrados</h2>
        </div>
        <div class="bsc-tbl">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Almacén</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $index => $empleado)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->area->nombre ?? '-' }}</td>
                        <td>{{ $empleado->almacen->nombre ?? '-' }}</td>
                        <td>
                            <button class="btn btn-info notika-btn-info btn-sm" wire:click="ver({{ $empleado->id }})">
                                <i class="notika-icon notika-eye"></i>
                            </button>
                            <button class="btn btn-warning notika-btn-warning btn-sm" wire:click="editar({{ $empleado->id }})">
                                <i class="notika-icon notika-edit"></i>
                            </button>
                            <button class="btn btn-danger notika-btn-danger btn-sm" wire:click="eliminar({{ $empleado->id }})" onclick="return confirm('¿Seguro de eliminar?')">
                                <i class="notika-icon notika-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No hay empleados registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>