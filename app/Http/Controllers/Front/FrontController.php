<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Configuracion;
use App\Models\Noticias;
use App\Models\Eventos;
use App\Models\Sugerencias;
use App\Models\Tramites;
use App\Models\TramitesTop;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index(){
        $banners = Banner::where('aprobado', 1)->orderBy('posicion', 'asc')->get();
        $noticias = Noticias::where('aprobado', 1)->orderBy('fecha', 'desc')->orderBy('created_at', 'desc')->limit(3)->get();
        $eventos = Eventos::where('aprobado', 1)->where('portada', 1)->whereDate('fecha_final', '>=', \Carbon\Carbon::now())->orderBy('fecha_inicio', 'desc')->limit(3)->get();
        $tramites = Tramites::where('aprobado', 1)->where('frecuente', 1)->orderBy('posicion', 'desc')->limit(5)->get();
        $tramites_top = TramitesTop::all();
        return view('front/index', compact('banners', 'noticias', 'eventos', 'tramites', 'tramites_top'));
    }

    public function contacto(){
        $config = Configuracion::first();
        return view('front.contact', compact('config'));
    }

    public function formsugerencias(Request $request){

        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'sugerencia' => 'required',
        ]);

        if ($validator->fails()) {
           flash('Lo sentimos ocurrio un error al enviar el formulario, favor de verificar los campos.')->error();
            return redirect()->to(url()->previous().'#form-sugerencias')
                        ->withErrors($validator)
                        ->withInput();
        }
        try { 

            $data = new Sugerencias();
            $data->fill($request->all());
            $data->save();

            flash('Mensaje enviado con éxito')->success();
            return redirect()->to(url()->previous().'#form-sugerencias');

        }catch (\Exception $e) {
            Log::error('ocurrio un error al enviar el formulario de sugerencias: '.$e);
            flash('Lo sentimos ocurrio un error al enviar el formulario, favor de verificar los campos.')->error();
            return redirect()->to(url()->previous().'#form-sugerencias') 
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function pbr(){
        return view('front.pbr');
    }
}
