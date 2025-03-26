<?php

namespace App\Http\Livewire\Front\Cabildo;

use Livewire\Component;
use App\Models\Cabildo;

class CabildoList extends Component
{
   
   
    public function render()
    {
        $data = Cabildo::where('aprobado', 1)->orderBy('posicion')->get();
        return view('livewire.front.cabildo.cabildo-list', compact('data'));
    }
}
