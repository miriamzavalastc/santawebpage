<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programas;

class ProgramasController extends Controller
{
    public function index(){
        return view('front.programas.index');
    }

    public function show($slug){
        $programa = Programas::where('slug', $slug)->first();
        if($programa){
            return view('front.programas.show', compact('programa'));
        }else{
            abort(404);
        }
    }

    public function descargar($id){
        $programa = Programas::find($id);
        $name_file = str_replace('storage/programas/',"", $programa->archivo);
        return response()->download(storage_path() . '/app/public/programas/'. $name_file);
     
    }
    
}
