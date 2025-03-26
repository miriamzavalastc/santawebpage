<?php

namespace App\Http\Livewire\Front\Eventos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Eventos;

class EventosPasadosList extends Component
{


    use WithPagination;  
    protected $paginationTheme = 'bootstrap';
    public $perpage = 10;


    public function render()
    {
        $eventos = Eventos::whereDate('fecha_final', '<=', \Carbon\Carbon::now())->orderBy('fecha_inicio', 'desc')->paginate($this->perpage);
        return view('livewire.front.eventos.eventos-pasados-list', compact('eventos'));
    }
}
