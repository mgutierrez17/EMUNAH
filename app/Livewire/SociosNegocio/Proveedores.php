<?php

namespace App\Livewire\SociosNegocio;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Proveedores extends Component
{
    use WithPagination;

    public $crearFormulario = false;
    public $modoEdicion = false;

    public $proveedor_id, $nom_proveedor, $nit, $direccion, $telefono, $correo, $estado = true;

    protected $rules = [
        'nom_proveedor' => 'required|string|max:50',
        'nit' => 'nullable|string|max:50',
        'direccion' => 'nullable|string|max:200',
        'telefono' => 'nullable|string|max:50',
        'correo' => 'nullable|email|max:100',
        'estado' => 'boolean',
    ];

    public function render()
    {
        return view('livewire.socios-negocio.proveedores', [
            'proveedores' => Proveedor::orderBy('nom_proveedor')->paginate(5)
        ]);
    }

    public function guardar()
    {
        $this->validate();
        Proveedor::create($this->only([
            'nom_proveedor',
            'nit',
            'direccion',
            'telefono',
            'correo',
            'estado'
        ]));

        $this->resetForm();
        session()->flash('success', 'Proveedor registrado.');
    }

    public function editar($id)
    {
        $p = Proveedor::findOrFail($id);

        $this->fill($p); // carga todos los campos
        $this->estado = (bool) $p->estado; // asegura que el checkbox funcione bien

        $this->proveedor_id = $p->id;
        $this->crearFormulario = true;
        $this->modoEdicion = true;
    }


    public function actualizar()
    {
        $this->validate();
        Proveedor::findOrFail($this->proveedor_id)
            ->update($this->only(['nom_proveedor', 'nit', 'direccion', 'telefono', 'correo', 'estado']));
        $this->resetForm();
        session()->flash('success', 'Proveedor actualizado.');
    }

    public function eliminar($id)
    {
        Proveedor::destroy($id);
        session()->flash('success', 'Proveedor eliminado.');
    }

    public function cancelar()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['proveedor_id', 'nom_proveedor', 'nit', 'direccion', 'telefono', 'correo', 'estado', 'crearFormulario', 'modoEdicion']);
    }
}
