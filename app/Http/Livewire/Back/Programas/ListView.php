<?php

namespace App\Http\Livewire\Back\Programas;

use Livewire\Component;
use App\Models\Programas;
use App\Models\Dependencias;
use Livewire\WithPagination;

class ListView extends Component
{
    use WithPagination;  
    public  $search_nombre, $search_tipo, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;


    protected $listeners  = ['deletePrograma'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deletePrograma(Programas $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_tipo',
            'search_aprobado',
        ]);
        $this->resetPage();
    }

  

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Programas::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_tipo, fn ($q) => $q->where('tipo_de_programa', 'like', '%'.$this->search_tipo.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('created_at', 'desc')
        ->paginate($this->perpage);
        return view('livewire.back.programas.list-view', compact('data'));
    }
}
