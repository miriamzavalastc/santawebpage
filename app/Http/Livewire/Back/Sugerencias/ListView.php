<?php

namespace App\Http\Livewire\Back\Sugerencias;

use Livewire\Component;
use App\Models\Sugerencias;
use Livewire\WithPagination;

class ListView extends Component
{

    use WithPagination;  
    public $search_nombre, $search_correo, $search_estatus;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteSugerencia'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deleteSugerencia(Sugerencias $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_correo',
            'search_estatus'
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Sugerencias::when($this->search_correo, fn ($q) => $q->where('correo', 'like', '%'.$this->search_correo.'%'))
        ->when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%')->orWhere('apellidos', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_estatus, fn ($q) => $q->where('estatus', '=', $this->search_estatus))
        ->orderBy('created_at', 'desc')
        ->paginate($this->perpage);
        return view('livewire.back.sugerencias.list-view', compact('data'));
    }
}
