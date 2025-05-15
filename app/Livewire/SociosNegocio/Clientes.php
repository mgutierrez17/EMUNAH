<?php

namespace App\Livewire\SociosNegocio;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;

    public $cliente_id, $nom_cliente, $nit, $direccion, $telefono, $correo, $estado = true;
    public $crearFormulario = false, $modoEdicion = false;

    protected $rules = [
        'nom_cliente' => 'required|string|max:50',
        'nit' => 'nullable|string|max:50',
        'direccion' => 'nullable|string|max:200',
        'telefono' => 'nullable|string|max:50',
        'correo' => 'nullable|email|max:100',
        'estado' => 'boolean',
    ];

    public function render()
    {
        return view('livewire.socios-negocio.clientes', [
            'clientes' => Cliente::orderBy('nom_cliente')->paginate(10)
        ]);
    }

    public function guardar()
    {
        $this->validate();

        Cliente::create($this->only([
            'nom_cliente', 'nit', 'direccion', 'telefono', 'correo', 'estado'
        ]));

        $this->resetForm();
        session()->flash('success', 'Cliente registrado correctamente.');
        $this->resetPage();
    }

    public function editar($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->fill($cliente);
        $this->estado = (bool) $cliente->estado;
        $this->cliente_id = $cliente->id;
        $this->crearFormulario = true;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate();

        Cliente::findOrFail($this->cliente_id)
            ->update($this->only([
                'nom_cliente', 'nit', 'direccion', 'telefono', 'correo', 'estado'
            ]));

        $this->resetForm();
        session()->flash('success', 'Cliente actualizado.');
    }

    public function eliminar($id)
    {
        Cliente::destroy($id);
        session()->flash('success', 'Cliente eliminado.');
    }

    public function cancelar()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset([
            'cliente_id', 'nom_cliente', 'nit', 'direccion', 'telefono', 'correo', 'estado',
            'crearFormulario', 'modoEdicion'
        ]);
    }
}
