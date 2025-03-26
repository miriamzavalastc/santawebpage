<?php

namespace App\Http\Livewire\Back\Transparencia;

use App\Models\Transparencia;
use Livewire\Component;
use Livewire\WithPagination;

class ListView extends Component
{
    use WithPagination;  
    public $search_nombre, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteTransparencia'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deleteTransparencia(Transparencia $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_aprobado'
        ]);
        $this->resetPage();
    }


    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Transparencia::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->paginate($this->perpage);
        return view('livewire.back.transparencia.list-view', compact('data'));
    }
}
