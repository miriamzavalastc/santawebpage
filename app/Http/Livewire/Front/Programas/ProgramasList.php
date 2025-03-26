<?php

namespace App\Http\Livewire\Front\Programas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Programas;
use App\Models\Dependencias;

class ProgramasList extends Component
{
    use WithPagination;  
    protected $paginationTheme = 'bootstrap';
    public $perpage = 10;
    public $secretarias, $search_secretaria, $search_nombre;

    public function mount(){
        $this->secretarias = Dependencias::all();
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
        $data = Programas::where('aprobado', 1)
        ->when($this->search_nombre, fn ($q) => $q->where('nombre',  'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_secretaria, fn ($q) => $q->where('dependencia_id', '=',$this->search_secretaria))
        ->orderBy('nombre', 'asc')->paginate($this->perpage);
        return view('livewire.front.programas.programas-list', compact('data'));
    }
}
