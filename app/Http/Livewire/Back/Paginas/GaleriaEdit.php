<?php

namespace App\Http\Livewire\Back\Paginas;

use Livewire\Component;
use App\Models\PaginasGalerias;
use Livewire\WithPagination;

class GaleriaEdit extends Component
{
    use WithPagination;  
    public  $pagina;
    protected $listeners  = ['btndescargarPage', 'btnDeleteImageGaleriaPage'];

    public function btndescargarPage($id)
    {
        $img = PaginasGalerias::find($id);
        $name_image = str_replace('/storage/paginas/',"", $img->img);
        $this->dispatchBrowserEvent('reloadPage');
        return response()->download(storage_path() . '/app/public/paginas/'. $name_image);
    }

    public function btnDeleteImageGaleriaPage(PaginasGalerias $dataID){

        $galeria = PaginasGalerias::find($dataID->id);
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
        $galeria = PaginasGalerias::where('paginas_id', $this->pagina)->get();
        return view('livewire.back.paginas.galeria-edit', compact('galeria'));
    }
}
