<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Tramites;
use Illuminate\Http\Request;

class TramitesController extends Controller
{
    public function index(){
        return view('front.tramites.index');
    }

    public function show($slug){
        $data = Tramites::where('slug', $slug)->first();
        if($data){
            return view('front.tramites.show', compact('data'));
        }else{
            abort(404);
        }
    }

    public function descargar($id){
        $tramite = Tramites::find($id);
        $name_file = str_replace('storage/tramites/',"", $tramite->archivo);
        return response()->download(storage_path() . '/app/public/tramites/'. $name_file);
     
    }
}
