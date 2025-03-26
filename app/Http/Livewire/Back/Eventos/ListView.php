<?php

namespace App\Http\Livewire\Back\Eventos;

use Livewire\Component;
use App\Models\Eventos;
use App\Models\EventosGalerias;
use Livewire\WithPagination;

class ListView extends Component
{

    use WithPagination;  
    public $search_nombre, $search_aprobado, $search_portada;
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;
    protected $listeners  = ['deleteEvento'];

    public function applyFilters(){
        $this->resetPage();
    }

    public function clearFilters(){
        $this->reset([
            'search_nombre',
            'search_aprobado',
            'search_portada',
        ]);
        $this->resetPage();
    }

    public function deleteEvento(Eventos $dataID){

        $galeria = EventosGalerias::where('eventos_id', $dataID->id)->get();

        if($galeria){
            if(count($galeria)>0){
                foreach($galeria as $ga){
                    $oldProfileImagega = $ga->img;
                    if ($oldProfileImagega != null) {
                        $oldProfileImagePathga = public_path($oldProfileImagega);
                        if (file_exists($oldProfileImagePathga)) {
                            unlink($oldProfileImagePathga);
                        }
                    }
                    $ga->delete();
                }
            }
        }

        $oldProfileImage = $dataID->img;

        if ($oldProfileImage != null) {
            $oldProfileImagePath = public_path($oldProfileImage);
            if (file_exists($oldProfileImagePath)) {
                unlink($oldProfileImagePath);
            }
        }

        $dataID->delete();
        $this->resetPage();
    }


    public function render()
    {
        $data = Eventos::when($this->search_nombre, fn ($q) => $q->where('nombre', 'like', '%'.$this->search_nombre.'%'))
        ->when($this->search_aprobado, fn ($q) => $q->where('aprobado', '=', $this->search_aprobado))       
        ->when($this->search_portada, fn ($q) => $q->where('portada', '=', $this->search_portada))    
        ->orderBy('fecha_final', 'desc')->paginate($this->perpage);
        return view('livewire.back.eventos.list-view', compact('data'));
    }
}
