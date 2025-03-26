<?php

namespace App\Http\Livewire\Front\Comisiones;

use App\Models\Comisiones;
use App\Models\Configuracion;
use Livewire\Component;

class ComisionesList extends Component
{
    public function render()
    {
        $config = Configuracion::first();
        $comisiones = Comisiones::where('tipo', 'Comisión Permanente')->where('aprobado', 1)->orderBy('posicion')->get();
        $especiales = Comisiones::where('tipo', 'Comisión Especial')->where('aprobado', 1)->orderBy('posicion')->get();
        return view('livewire.front.comisiones.comisiones-list', compact('comisiones', 'especiales', 'config'));
    }
}
