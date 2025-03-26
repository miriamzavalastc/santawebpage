<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eventos;

class EventosController extends Controller
{
    public function index(){
        return view('front.eventos.index');
    }

    public function old(){
        return view('front.eventos.old');
    }
    public function show($slug){
        $data = Eventos::where('slug', $slug)->first();
        $noticiasrelacion = Eventos::whereDate('fecha_final', '>=', \Carbon\Carbon::now())->whereKeyNot($data->id)->orderBy('fecha_final', 'desc')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('front.eventos.show', compact('data', 'noticiasrelacion'));
    }
}
