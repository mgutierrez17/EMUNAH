<?php
namespace App\Livewire\Configuracion;

use Livewire\Component;
use App\Models\ListaPrecio;
use App\Models\Pedido;

class ListaPrecios extends Component
{
    public $listas;

    public function mount()
    {
        $this->actualizarListas();
    }

    public function actualizarListas()
    {
        $this->listas = ListaPrecio::orderByDesc('id')->get();
    }

    public function eliminar($id)
    {
        $lista = ListaPrecio::find($id);

        if ($lista->pedidos()->count() > 0) {
            session()->flash('error', 'No se puede eliminar esta lista porque ya fue usada en pedidos.');
            return;
        }

        $lista->productos()->delete();
        $lista->delete();
        $this->actualizarListas();

        session()->flash('success', 'Lista de precios eliminada correctamente.');
    }

    public function render()
    {
        return view('livewire.configuracion.lista-precios');
    }
}
