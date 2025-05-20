<?php

namespace App\Livewire\Configuracion;

use App\Models\Empresa as EmpresaModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Empresa extends Component
{
    use WithFileUploads;

    public $nombre, $telefono, $direccion, $correo, $nit, $logo;
    public $empresaId = null;
    public $modoEdicion = false;
    public $modoLectura = false;

    public function editar()
    {
        $this->modoLectura = false;
    }


    public function mount()
    {
        $empresa = \App\Models\Empresa::first();

        if ($empresa) {
            $this->empresaId = $empresa->id;
            $this->fill($empresa);
            $this->modoLectura = true;
        } else {
            $this->modoLectura = false;
        }
    }


    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:200',
            'correo' => 'nullable|email|max:100',
            'nit' => 'nullable|string|max:50',
            'logo' => is_object($this->logo) ? 'image|max:1024' : 'nullable',
        ]);
        $data = $this->only(['nombre', 'telefono', 'direccion', 'correo', 'nit']);

        if (is_object($this->logo)) {
            $data['logo'] = $this->logo->store('logo', 'public');
        }
        if ($this->empresaId) {
            \App\Models\Empresa::find($this->empresaId)->update($data);
        } else {
            $empresa = \App\Models\Empresa::create($data);
            $this->empresaId = $empresa->id;
        }
        session()->flash('success', 'Datos de la empresa guardados correctamente.');
        $this->modoLectura = true;
    }

    public function render()
    {
        return view('livewire.configuracion.empresa');
    }

    public function cancelar()
    {
        $empresa = \App\Models\Empresa::first();
        if ($empresa) {
            $this->fill($empresa); // recarga los datos actuales
            $this->modoLectura = true;
        }
    }
}
