<?php

namespace App\Http\Livewire\Front\Directorio;

use Livewire\Component;
use App\Models\Directorio;
use Livewire\WithPagination;

class DirectorioList extends Component
{
    use WithPagination;  
    public $search_departamento, $search_lugar, $search_ubicacion;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_departamento',
            'search_lugar',
            'search_ubicacion'
        ]);
        $this->resetPage();
    }
    
    public function render()
    {
        $data = Directorio::where('aprobado', 1)
        ->when($this->search_departamento, fn ($q) => $q->where('departamento', 'like', '%'.$this->search_departamento.'%'))
        ->when($this->search_lugar, fn ($q) => $q->where('lugar',  'like', '%'.$this->search_lugar.'%'))
        ->when($this->search_ubicacion, fn ($q) => $q->where('ubicacion',  'like', '%'.$this->search_ubicacion.'%'))
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);

        return view('livewire.front.directorio.directorio-list', compact('data'));
    }
}
