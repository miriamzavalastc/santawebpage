<?php

namespace App\Http\Livewire\Front\TitularesDependencias;

use Livewire\Component;
use App\Models\TitularesDependencias;

class TitularesDependenciasList extends Component
{
    public function render()
    {
        $data = TitularesDependencias::where('aprobado', 1)->orderBy('posicion')->get();
        return view('livewire.front.titulares-dependencias.titulares-dependencias-list', compact('data'));
    }
}
