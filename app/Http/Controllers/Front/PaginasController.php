<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paginas;

class PaginasController extends Controller
{
    public function show($slug){
        $data = Paginas::where('slug', $slug)->first();
        if($data){
            return view('front.paginas.show', compact('data'));
        }else{
            abort(404);
        }
       
    }

    public function descargar($id){
        $programa = Paginas::find($id);
        $name_file = str_replace('storage/paginas/',"", $programa->archivo);
        return response()->download(storage_path() . '/app/public/paginas/'. $name_file);
    }

}
