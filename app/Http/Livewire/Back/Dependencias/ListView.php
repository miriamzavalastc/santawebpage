<?php

namespace App\Http\Livewire\Back\Dependencias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dependencias;

class ListView extends Component
{
    use WithPagination;
    public $search_secretaria, $search_secretario, $search_telefono, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    protected $listeners  = ['deleteDependencias'];

    public function applyFilters(){
        $this->resetPage();
    }
    

    public function deleteDependencias(Dependencias $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_secretaria',
            'search_secretario',
            'search_telefono',
            'search_aprobado'
           
        ]);
        $this->resetPage();
    }

    public function updateDependenciaOrder($items){
        foreach($items as $item){
            Dependencias::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Dependencias::when($this->search_secretaria, fn ($q) => $q->where('secretaria', 'like', '%'.$this->search_secretaria.'%'))
        ->when($this->search_secretario, fn ($q) => $q->where('secretario', 'like', '%'.$this->search_secretario.'%'))
        ->when($this->search_telefono, fn ($q) => $q->where('telefono', 'like', '%'.$this->search_telefono.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);
        return view('livewire.back.dependencias.list-view', compact('data'));
    }


}
