<?php

namespace App\Http\Livewire\Back\Paginas;

use Livewire\Component;
use App\Models\Paginas;
use Livewire\WithPagination;

class FileEdit extends Component
{

    use WithPagination;  
    public $pagina;
    protected $listeners  = ['btndescargarFilePagina', 'btnDeleteFilePagina'];

    public function btndescargarFilePagina($data)
    {
      
        $file = Paginas::find($data);
        $name_file = str_replace('storage/paginas/',"", $file->archivo);
        $this->dispatchBrowserEvent('reloadPage');
        return response()->download(storage_path() . '/app/public/paginas/'. $name_file);
       
    }

     public function btnDeleteFilePagina($data){
        $file = Paginas::find($data);
        $oldFile = $file->archivo;
        if ($oldFile != null) {
            $oldFilePath = public_path($oldFile);
            unlink($oldFilePath);
            $file->archivo = null;
            $file->save();
        }
        return redirect(route('sistema.paginas.edit', $data));
       
    }

    public function render()
    {
        return view('livewire.back.paginas.file-edit');
    }
}
