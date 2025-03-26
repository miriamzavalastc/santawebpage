<?php

namespace App\Http\Livewire\Front\Tramites;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tramites;
use App\Models\Dependencias;

class TramitesList extends Component
{
    use WithPagination;  
    protected $paginationTheme = 'bootstrap';
    public $perpage = 15;
    public $secretarias, $search_secretaria, $search_nombre, $tramitestop;

    public function mount(){
        $this->secretarias = Dependencias::all();
        $this->tramitestop = Tramites::where('aprobado', 1)->where('frecuente', 1)->orderBy('posicion', 'desc')->limit(5)->get();

    }

    
    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_secretaria',
            'search_nombre'
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $data = Tramites::where('aprobado', 1)
        ->when($this->search_nombre, fn ($q) => $q->where('nombre',  'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_secretaria, fn ($q) => $q->where('dependencia_id', '=',$this->search_secretaria))
        ->orderBy('nombre', 'asc')->paginate($this->perpage);
        return view('livewire.front.tramites.tramites-list', compact('data'));
    }
}
