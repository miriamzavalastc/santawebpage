<?php

namespace App\Http\Livewire\Back\TitularesDependencias;

use App\Models\TitularesDependencias;
use App\Models\Dependencias;
use Livewire\Component;
use Livewire\WithPagination;

class ListView extends Component
{
    use WithPagination;  
    public $search_secretario, $search_secretaria, $search_telefono, $search_aprobado, $secretarias;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    protected $listeners  = ['deleteTitularDependencias'];

    public function mount(){
        $this->secretarias = Dependencias::all();
    }

    public function applyFilters(){
        $this->resetPage();
    }

    public function deleteTitularDependencias(TitularesDependencias $dataID){
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
            TitularesDependencias::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }


    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = TitularesDependencias::orderBy('posicion', 'asc')
        ->when($this->search_secretario, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_secretario.'%'))
        ->when($this->search_secretaria, fn ($q) => $q->where('dependencia_id', 'like', '%'.$this->search_secretaria.'%'))
        ->when($this->search_telefono, fn ($q) => $q->where('telefono', 'like', '%'.$this->search_telefono.'%')) 
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);
        return view('livewire.back.titulares-dependencias.list-view', compact('data'));
    }
}
