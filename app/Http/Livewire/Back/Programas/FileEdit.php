<?php

namespace App\Http\Livewire\Back\Programas;

use Livewire\Component;
use App\Models\Programas;
use Livewire\WithPagination;

class FileEdit extends Component
{
    use WithPagination;  
    public $programa;
    protected $listeners  = ['btndescargarFilePrograma', 'btnDeleteFilePrograma'];

    public function btndescargarFilePrograma($data)
    {
      
        $file = Programas::find($data);
        $name_file = str_replace('storage/programas/',"", $file->archivo);
        $this->dispatchBrowserEvent('reloadPage');
        return response()->download(storage_path() . '/app/public/programas/'. $name_file);
       
    }

    public function btnDeleteFilePrograma($data){
        $file = Programas::find($data);
        $oldFile = $file->archivo;
        if ($oldFile != null) {
            $oldFilePath = public_path($oldFile);
            unlink($oldFilePath);
            $file->archivo = null;
            $file->save();
        }
        return redirect(route('sistema.programas.edit', $data));
       
    }

    public function render()
    {
        return view('livewire.back.programas.file-edit');
    }
}
