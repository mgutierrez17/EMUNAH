<?php

namespace App\Livewire\Configuracion;

use Livewire\Component;
use App\Models\Categoria;

class Categorias extends Component
{
    public $crearFormulario = false;
    public $modoEdicion = false;
    public $categoria_id;
    public $nom_categoria;

    /*
    protected $rules = [
        'nom_categoria' => 'required|string|max:50',
    ];
    */

    public function rules()
    {
        return [
            'nom_categoria' => 'required|string|max:50|unique:categorias,nom_categoria,' . $this->categoria_id,
        ];
    }

    protected $messages = [
        'nom_categoria.unique' => 'Ya existe una categoría con ese nombre.',
    ];


    public function guardar()
    {
        $this->validate();
        Categoria::create(['nom_categoria' => $this->nom_categoria]);
        $this->resetForm();
        session()->flash('success', 'Categoría creada correctamente.');
    }

    public function editar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nom_categoria = $categoria->nom_categoria;
        $this->crearFormulario = true;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate();
        Categoria::find($this->categoria_id)->update([
            'nom_categoria' => $this->nom_categoria
        ]);
        $this->resetForm();
        session()->flash('success', 'Categoría actualizada correctamente.');
    }

    /*
    public function eliminar($id)
    {
        Categoria::find($id)->delete();
        session()->flash('success', 'Categoría eliminada correctamente.');
    }
        */

    public function eliminar($id)
    {
        $categoria = Categoria::withCount('productos')->findOrFail($id);

        if ($categoria->productos_count > 0) {
            session()->flash('error', 'No se puede eliminar: la categoría tiene productos asignados.');
            return;
        }

        $categoria->delete();
        session()->flash('success', 'Categoría eliminada correctamente.');
    }

    public function resetForm()
    {
        $this->reset(['crearFormulario', 'modoEdicion', 'categoria_id', 'nom_categoria',]);
    }

    public function render()
    {
        return view('livewire.configuracion.categorias', [
            'categorias' => Categoria::orderBy('nom_categoria')->get()
        ]);
    }

    public function cancelar()
    {
        $this->resetForm();
    }
}
