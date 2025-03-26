<?php

namespace App\Http\Livewire\Config;

use App\Models\Configuracion;
use Livewire\Component;

class Styles extends Component
{
    public function render()
    {
        $config = Configuracion::first();
        return view('livewire.config.styles', compact('config'));
    }
}
