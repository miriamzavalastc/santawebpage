<?php

namespace App\Http\Livewire\Back\Noticias;

use Livewire\Component;
use App\Models\NoticiasGaleria;
use Livewire\WithPagination;

class GaleriaEdit extends Component
{
    use WithPagination;  
    public  $noticia;
    protected $listeners  = ['btndescargar', 'btnDeleteImageGaleria'];

    public function btndescargar($id)
    {
        $img = NoticiasGaleria::find($id);
        $name_image = str_replace('/storage/noticias/',"", $img->img);
        $this->dispatchBrowserEvent('reloadPage');
        return response()->download(storage_path() . '/app/public/noticias/'. $name_image);
    }

    public function btnDeleteImageGaleria(NoticiasGaleria $dataID){

        $galeria = NoticiasGaleria::find($dataID->id);
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
        $galeria = NoticiasGaleria::where('noticias_id', $this->noticia)->get();
        return view('livewire.back.noticias.galeria-edit', compact('galeria'));
    }
}
