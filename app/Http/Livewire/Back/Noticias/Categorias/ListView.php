<?php

namespace App\Http\Livewire\Back\Noticias\Categorias;

use App\Models\NoticiasCategorias;
use Livewire\WithPagination;
use Livewire\Component;

class ListView extends Component
{

    use WithPagination;  
    public $search_nombre, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    protected $listeners  = ['deleteNoticiasCategoria'];

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

    public function deleteNoticiasCategoria(NoticiasCategorias $dataID){

        
        $dataID->delete();
        $this->resetPage();
    }


 

    public function render()
    {
        $data = NoticiasCategorias::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('id', 'desc')->paginate($this->perpage);
        return view('livewire.back.noticias.categorias.list-view', compact('data'));
    }
}
