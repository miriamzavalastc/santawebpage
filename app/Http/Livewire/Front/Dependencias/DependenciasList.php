<?php

namespace App\Http\Livewire\Front\Dependencias;

use App\Models\Dependencias;
use Livewire\Component;

class DependenciasList extends Component
{
    public function render()
    {
        $data = Dependencias::where('aprobado', 1)->orderBy('posicion')->get();
        return view('livewire.front.dependencias.dependencias-list', compact('data'));
    }
}
