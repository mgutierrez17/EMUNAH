<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Menu extends Component
{
    public $usuario;

    public function mount()
    {
        $this->usuario = Auth::user();
    }

    public function render()
    {
        return view('livewire.layout.menu');
    }
}
