<?php

namespace App\Http\Livewire\Back\Eventos\Categorias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EventosCategorias;

class ListView extends Component
{
    use WithPagination;  
    public $search_nombre, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    protected $listeners  = ['deleteCategoriaEvento'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_aprobado'
        ]);
        $this->resetPage();
    }

    public function deleteCategoriaEvento(EventosCategorias $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function render()
    {
        $data = EventosCategorias::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('id', 'desc')->paginate($this->perpage);
        return view('livewire.back.eventos.categorias.list-view', compact('data'));
    }
}
