<?php

namespace App\Http\Livewire\Front\Transparencia;

use App\Models\Transparencia;
use Livewire\Component;

class LinksView extends Component
{

    public function render()
    {
        $linksTransp = Transparencia::where('aprobado', true)->get();
        return view('livewire.front.transparencia.links-view', compact('linksTransp'));
    }
}
