<?php

namespace App\Http\Livewire\Back\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class ListView extends Component
{
    use WithPagination;  
    protected $paginationTheme = 'bootstrap';
    public $perpage = 5;

    protected $listeners  = ['deleteBanner'];


    public function updateBannerOrder($items){
        foreach($items as $item){
            Banner::find($item['value'])->update(['posicion' => $item['order']]);
        }
    }

    public function deleteBanner(Banner $dataID){
        $dataID->delete();
        $this->resetPage();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('dropCreate');
        $data = Banner::orderBy('posicion', 'asc')->paginate($this->perpage);
        return view('livewire.back.banner.list-view', compact('data'));
    }
}
