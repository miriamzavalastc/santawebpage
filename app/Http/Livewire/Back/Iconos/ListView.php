<?php

namespace App\Http\Livewire\Back\Iconos;

use App\Models\Iconos;
use Livewire\WithPagination;
use Livewire\Component;

class ListView extends Component
{

    use WithPagination;  
    public $search_nombre;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    protected $listeners  = ['deleteIcono'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
        ]);
        $this->resetPage();
    }

    public function deleteIcono(Iconos $dataID){

        
        $dataID->delete();
        $this->resetPage();
    }



    public function render()
    {
        $data = Iconos::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->orderBy('id', 'desc')->paginate($this->perpage);
        return view('livewire.back.iconos.list-view', compact('data'));
    }
}
