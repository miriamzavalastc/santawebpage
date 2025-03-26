<?php

namespace App\Http\Livewire\Back\Paginas;

use Livewire\Component;
use App\Models\Paginas;
use Livewire\WithPagination;

class ListView extends Component
{

    use WithPagination;  
    public $search_nombre, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deletePaginas'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deletePaginas(Paginas $dataID){
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
        $data = Paginas::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->paginate($this->perpage);
        return view('livewire.back.paginas.list-view', compact('data'));
    }
}
