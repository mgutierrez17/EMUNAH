<?php

namespace App\Livewire\Configuracion;

use Livewire\Component;
use App\Models\ListaPrecio;
use App\Models\ListaPrecioProducto;

class ListaPrecioForm extends Component
{
    public $nom_lista, $fecha_inicio, $fecha_final, $estado = true;
    public $duplicar_desde = null;
    public $listas_existentes = [];

    public function mount()
    {
        $this->listas_existentes = ListaPrecio::all();
    }

    public function guardar()
    {
        $this->validate([
            'nom_lista' => 'required|string|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $lista = ListaPrecio::create([
            'nom_lista' => $this->nom_lista,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'estado' => $this->estado,
        ]);

        if ($this->duplicar_desde) {
            $original = ListaPrecio::with('productos')->find($this->duplicar_desde);
            foreach ($original->productos as $producto) {
                if ($producto->producto_id && $producto->precio !== null) {
                    ListaPrecioProducto::create([
                        'lista_precio_id' => $lista->id,
                        'producto_id' => $producto->producto_id,
                        'precio' => $producto->precio,
                    ]);
                }
            }
        }

        session()->flash('success', 'Lista de precios creada correctamente.');
        $this->reset(['nom_lista', 'fecha_inicio', 'fecha_final', 'estado', 'duplicar_desde']);
        $this->listas_existentes = ListaPrecio::all(); // refrescar
    }

    public function render()
    {
        return view('livewire.configuracion.lista-precio-form');
    }
}
