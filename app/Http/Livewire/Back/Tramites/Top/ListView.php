<?php

namespace App\Http\Livewire\Back\Tramites\Top;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TramitesTop;

class ListView extends Component
{
    use WithPagination;  
    public  $search_nombre, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteServicioTop'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_aprobado',
        ]);
        $this->resetPage();
    }

    public function deleteServicioTop(TramitesTop $dataID){
        $dataID->delete();
        $this->resetPage();
    }


    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = TramitesTop::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('created_at', 'desc')
        ->paginate($this->perpage);

        return view('livewire.back.tramites.top.list-view', compact('data'));
    }
}
