<?php

namespace App\Http\Livewire\Front\Noticias;

use Livewire\Component;
use App\Models\Noticias;
use App\Models\NoticiasCategorias;
use Livewire\WithPagination;

class NoticiasList extends Component
{
    use WithPagination;  
    public $search_nombre, $search_categoria, $categorias;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 9;

    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_categoria',
        ]);
        $this->resetPage();
    }

    public function mount(){
        $this->categorias = NoticiasCategorias::where('aprobado', 1)->orderBy('nombre', 'asc')->get();
    }

    public function render()
    {
        $noticias = Noticias::where('aprobado', 1)
        ->when($this->search_nombre, fn ($q) => $q->where('titulo', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_categoria, fn ($q) => $q->where('noticias_categorias_id', $this->search_categoria))
        ->orderBy('fecha', 'desc')
        ->orderBy('created_at', 'desc')->paginate($this->perpage);
        return view('livewire.front.noticias.noticias-list', compact('noticias'));
    }
}
