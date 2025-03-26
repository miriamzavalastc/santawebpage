<?php

namespace App\Http\Livewire\Back\Tramites;

use Livewire\Component;
use App\Models\Tramites;
use App\Models\Dependencias;
use Livewire\WithPagination;

class ListView extends Component
{

    use WithPagination;  
    public  $search_nombre, $search_tipo, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteTramite'];

    public function applyFilters(){
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

    public function updateTramiteOrder($items){
        foreach($items as $item){
            Tramites::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }

    public function deleteTramite(Tramites $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Tramites::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);
        return view('livewire.back.tramites.list-view', compact('data'));
    }
}
