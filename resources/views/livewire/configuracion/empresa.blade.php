<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p>MODO: {{ $modoLectura ? 'lectura' : 'formulario' }}</p>

    {{-- Mostrar botón de editar si ya existe empresa --}}
    @if ($modoLectura)
    <div class="form-element-list">
        <div class="basic-tb-hd">
            <h2>Información de la Empresa</h2>
            <p>Visualización de los datos registrados.</p>
        </div>

        <div class="text-right mb-3">
            <button wire:click="editar" class="btn btn-warning notika-btn-warning">
                <i class="notika-icon notika-edit"></i> Editar
            </button>
        </div>

        <div class="row">
            <!-- Nombre -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ic-cmp-int">
                    <div class="nk-int-st">
                        <label><strong>Nombre:</strong></label>
                        <p class="form-control">{{ $nombre }}</p>
                    </div>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ic-cmp-int">
                    <div class="nk-int-st">
                        <label><strong>Teléfono:</strong></label>
                        <p class="form-control">{{ $telefono }}</p>
                    </div>
                </div>
            </div>

            <!-- Dirección -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ic-cmp-int">
                    <div class="nk-int-st">
                        <label><strong>Dirección:</strong></label>
                        <p class="form-control">{{ $direccion }}</p>
                    </div>
                </div>
            </div>

            <!-- Correo -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ic-cmp-int">
                    <div class="nk-int-st">
                        <label><strong>Correo:</strong></label>
                        <p class="form-control">{{ $correo }}</p>
                    </div>
                </div>
            </div>

            <!-- NIT -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ic-cmp-int">
                    <div class="nk-int-st">
                        <label><strong>NIT:</strong></label>
                        <p class="form-control">{{ $nit }}</p>
                    </div>
                </div>
            </div>

            <!-- Logo -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ic-cmp-int">
                    <label><strong>Logo:</strong></label><br>
                    @if ($logo)
                    <img src="{{ asset('storage/' . $logo) }}" alt="Logo" width="120">
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif


    {{-- Mostrar formulario si estamos en modo edición --}}
    @if (!$modoLectura)
    <form wire:submit.prevent="guardar" enctype="multipart/form-data">
        <div class="form-element-list">
            <div class="basic-tb-hd">
                <h2>Datos de la Empresa</h2>
                <p>Formulario para registrar o actualizar la información empresarial.</p>
            </div>

            <div class="row">
                <!-- Nombre -->
                <div class="col-md-6">
                    <label>Nombre</label>
                    <input type="text" wire:model="nombre" class="form-control">
                    @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <!-- Teléfono -->
                <div class="col-md-6">
                    <label>Teléfono</label>
                    <input type="text" wire:model="telefono" class="form-control">
                </div>

                <!-- Dirección -->
                <div class="col-md-6">
                    <label>Dirección</label>
                    <input type="text" wire:model="direccion" class="form-control">
                </div>

                <!-- Correo -->
                <div class="col-md-6">
                    <label>Correo</label>
                    <input type="email" wire:model="correo" class="form-control">
                </div>

                <!-- NIT -->
                <div class="col-md-6">
                    <label>NIT</label>
                    <input type="text" wire:model="nit" class="form-control">
                </div>

                <!-- Logo -->
                <div class="col-md-6">
                    <label>Logo</label>
                    <input type="file" wire:model="logo" class="form-control">
                    @if ($logo && is_object($logo))
                    <div class="mt-2">
                        <img src="{{ $logo->temporaryUrl() }}" width="120">
                    </div>
                    @elseif ($logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $logo) }}" width="120">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary notika-btn-primary" type="submit">
                <i class="notika-icon notika-checked"></i> Guardar
            </button>
            
            <button type="button" wire:click="cancelar" class="btn btn-default notika-btn-alert">
                <i class="notika-icon notika-left-arrow"></i> Cancelar
            </button>
        </div>
    </form>
    @endif
</div>