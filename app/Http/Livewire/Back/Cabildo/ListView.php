<?php

namespace App\Http\Livewire\Back\Cabildo;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cabildo;

class ListView extends Component
{
    use WithPagination;  
    public $search_nombre, $search_cargo, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;


    protected $listeners  = ['deleteCabildo'];

    public function applyFilters(){
        $this->resetPage();
    }

    
    public function deleteCabildo(Cabildo $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function updateComisionOrder($items){
        foreach($items as $item){
            Cabildo::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_cargo',
            'search_aprobado'
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Cabildo::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_cargo, fn ($q) => $q->where('cargo', 'like', '%'.$this->search_cargo.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);
        return view('livewire.back.cabildo.list-view', compact('data'));
    }
}
