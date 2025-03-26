<?php

namespace App\Http\Livewire\Back\Noticias;

use Livewire\Component;
use App\Models\Noticias;
use App\Models\NoticiasGaleria;
use Livewire\WithPagination;
class ListView extends Component
{

    use WithPagination;  
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteNoticia'];

    public function deleteNoticia(Noticias $dataID){

        $galeria = NoticiasGaleria::where('noticias_id', $dataID->id)->get();

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
        $data = Noticias::orderBy('fecha', 'desc')->orderBy('created_at', 'desc')->paginate($this->perpage);
        return view('livewire.back.noticias.list-view', compact('data'));
    }
}
