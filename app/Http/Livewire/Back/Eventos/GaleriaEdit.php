<?php

namespace App\Http\Livewire\Back\Eventos;

use Livewire\Component;
use App\Models\EventosGalerias;
use Livewire\WithPagination;

class GaleriaEdit extends Component
{
    use WithPagination;  
    public  $eventoid;
    protected $listeners  = ['btndescargarEvento', 'btnDeleteImageGaleria'];

    public function btndescargarEvento($id)
    {
        $img = EventosGalerias::find($id);
        $name_image = str_replace('/storage/eventos/',"", $img->img);
        $this->dispatchBrowserEvent('reloadPage');
        return response()->download(storage_path() . '/app/public/eventos/'. $name_image);
    }


    public function btnDeleteImageGaleria(EventosGalerias $dataID){
        $galeria = EventosGalerias::find($dataID->id);
        $oldProfileImagega = $galeria->img;
        if ($oldProfileImagega != null) {
            $oldProfileImagePathga = public_path($oldProfileImagega);
            if (file_exists($oldProfileImagePathga)) {
                unlink($oldProfileImagePathga);
            }
        }
        $dataID->delete();
        $this->resetPage();
    }

    public function render()
    {
        $galeria = EventosGalerias::where('eventos_id', $this->eventoid)->get();
       
        return view('livewire.back.eventos.galeria-edit', compact('galeria'));
    }
}
