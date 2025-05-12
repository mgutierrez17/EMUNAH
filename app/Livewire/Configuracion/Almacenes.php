<?php

namespace App\Livewire\Configuracion;

use Livewire\Component;
use App\Models\Almacen;

class Almacenes extends Component
{
    public $crearFormulario = false;
    public $nom_almacen;
    public $direccion_almacen;
    public $almacen_id;
    public $modoEdicion = false;

    protected $rules = [
        'nom_almacen' => 'required|string|max:50',
        'direccion_almacen' => 'required|string|max:200',
    ];

    public function guardar()
    {
        $this->validate();

        Almacen::create([
            'nom_almacen' => $this->nom_almacen,
            'direccion_almacen' => $this->direccion_almacen,
        ]);

        $this->reset(['nom_almacen', 'direccion_almacen']);
        $this->crearFormulario = false;
        session()->flash('success', 'Almacén registrado correctamente.');
    }

    public function render()
    {
        return view('livewire.configuracion.almacenes', [
            'almacenes' => Almacen::latest()->get(),
        ]);
    }

    public function editar($id)
    {
        $almacen = Almacen::findOrFail($id);
        $this->almacen_id = $almacen->id;
        $this->nom_almacen = $almacen->nom_almacen;
        $this->direccion_almacen = $almacen->direccion_almacen;
        $this->modoEdicion = true;
        $this->crearFormulario = true;
    }

    public function actualizar()
    {
        $this->validate();

        $almacen = Almacen::findOrFail($this->almacen_id);
        $almacen->update([
            'nom_almacen' => $this->nom_almacen,
            'direccion_almacen' => $this->direccion_almacen,
        ]);

        $this->reset(['nom_almacen', 'direccion_almacen', 'crearFormulario', 'modoEdicion']);
        session()->flash('success', 'Almacén actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $almacen = Almacen::withCount('productos')->findOrFail($id);

        if ($almacen->productos_count > 0) {
            session()->flash('error', 'No se puede eliminar: el almacén tiene productos asignados.');
            return;
        }

        $almacen->delete();
        session()->flash('success', 'Almacén eliminado correctamente.');
    }


    public function cancelar()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset([
            'almacen_id',
            'nom_almacen',
            'direccion_almacen',
            'crearFormulario',
            'modoEdicion',
        ]);
    }




    /* /////proteger eliminar con autorización (opcional)
    public function eliminar($id)
    {
        // if (!auth()->user()->can('eliminar_almacenes')) abort(403);
        Almacen::findOrFail($id)->delete();
    }
    */
}
