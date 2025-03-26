<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticias;

class NoticiasController extends Controller
{

    public function index(){
        return view('front.noticias.index');
    }

    public function show($slug){
        $data = Noticias::where('slug', $slug)->first();
        if($data){
            $noticiasrelacion = Noticias::whereKeyNot($data->id)->where('aprobado', 1)->orderBy('fecha', 'desc')->orderBy('created_at', 'desc')->limit(3)->get();
            return view('front.noticias.show', compact('data', 'noticiasrelacion'));
        }else{
            abort(404);
        }
    }
}
