<div class="container">
    <h3>Listas de Precios</h3>

    @if (session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-hover mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre de Lista</th>
                <th>Fecha Inicio</th>
                <th>Fecha Final</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listas as $index => $lista)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $lista->nom_lista }}</td>
                <td>{{ $lista->fecha_inicio }}</td>
                <td>{{ $lista->fecha_final }}</td>
                <td>
                    <span class="label {{ $lista->estado ? 'label-success' : 'label-warning' }}">
                        {{ $lista->estado ? 'Habilitado' : 'Deshabilitado' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('lista_precios.ver', $lista->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('lista_precios.editar', $lista->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <button wire:click="eliminar({{ $lista->id }})" onclick="return confirm('¿Eliminar esta lista?')" class="btn btn-danger btn-sm">Eliminar</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No hay listas de precios registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>