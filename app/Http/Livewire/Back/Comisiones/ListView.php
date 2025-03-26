<?php

namespace App\Http\Livewire\Back\Comisiones;

use App\Models\Comisiones;
use App\Models\Dependencias;
use Livewire\Component;
use Livewire\WithPagination;

class ListView extends Component
{ 
    use WithPagination;  
    public $search_tipo, $search_comision, $search_presidente, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteComision'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deleteComision(Comisiones $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function updateComisionOrder($items){
        foreach($items as $item){
            Comisiones::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }

    public function clearFilters(){
        $this->reset([
            'search_tipo',
            'search_comision',
            'search_presidente',
            'search_aprobado'
        ]);
        $this->resetPage();
    }


    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Comisiones::when($this->search_comision, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_comision.'%'))
        ->when($this->search_presidente, fn ($q) => $q->where('presidente', 'like', '%'.$this->search_presidente.'%'))
        ->when($this->search_tipo, fn ($q) => $q->where('tipo', '=', $this->search_tipo))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);
        return view('livewire.back.comisiones.list-view', compact('data'));
    }
}
