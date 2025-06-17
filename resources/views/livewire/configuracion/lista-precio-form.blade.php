<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="guardar">
        <div class="row">
            <div class="col-md-6">
                <label>Nombre de la Lista</label>
                <input type="text" class="form-control" wire:model="nom_lista">
                @error('nom_lista') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-3">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" wire:model="fecha_inicio">
                @error('fecha_inicio') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-3">
                <label>Fecha Final</label>
                <input type="date" class="form-control" wire:model="fecha_final">
                @error('fecha_final') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label>Duplicar desde:</label>
                <select class="form-control" wire:model="duplicar_desde">
                    <option value="">-- Ninguna --</option>
                    @foreach ($listas_existentes as $lista)
                    <option value="{{ $lista->id }}">{{ $lista->nom_lista }} ({{ $lista->fecha_inicio }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mt-3">
                <label>Estado</label>
                <select class="form-control" wire:model="estado">
                    <option value="1">Habilitado</option>
                    <option value="0">Deshabilitado</option>
                </select>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary notika-btn-primary">
                <i class="notika-icon notika-checked"></i> Guardar Lista de Precios
            </button>
        </div>
    </form>
</div>