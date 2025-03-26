<?php

namespace App\Http\Livewire\Back\Directorio;

use Livewire\Component;
use App\Models\Directorio;
use Livewire\WithPagination;

class ListView extends Component
{
    use WithPagination;  
    public $search_departamento, $search_lugar, $search_aprobado;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteDirectorio'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deleteDirectorio(Directorio $dataID){
        $dataID->delete();
        $this->resetPage();
    }
    public function updateDirectorioOrder($items){
        foreach($items as $item){
            Directorio::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }

    public function clearFilters(){
        $this->reset([
            'search_departamento',
            'search_lugar',
            'search_aprobado'
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Directorio::when($this->search_departamento, fn ($q) => $q->where('departamento', 'like', '%'.$this->search_departamento.'%'))
        ->when($this->search_lugar, fn ($q) => $q->where('lugar',  'like', '%'.$this->search_lugar.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))
       
        ->orderBy('posicion', 'asc')
        ->paginate($this->perpage);
        return view('livewire.back.directorio.list-view', compact('data'));
    }
}
