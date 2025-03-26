<?php

namespace App\Http\Livewire\Back\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ListView extends Component
{

    use WithPagination;  
    public $search_nombre, $search_correo;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteUser'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function deleteUser(User $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_correo',
        ]);
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = User::when($this->search_correo, fn ($q) => $q->where('email', 'like', '%'.$this->search_correo.'%'))
        ->when($this->search_nombre, fn ($q) => $q->where('name', 'like', '%'.$this->search_nombre.'%'))
        ->paginate($this->perpage);
        return view('livewire.back.users.list-view', compact('data'));
    }
}
