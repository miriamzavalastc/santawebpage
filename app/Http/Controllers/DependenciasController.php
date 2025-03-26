<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencias;
use App\Models\Icons;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class DependenciasController extends Controller
{
    public function index(){
        return view('back.dependencias.index');
    }

    public function show(Dependencias $dependencia){
        return view('back.dependencias.show', compact('dependencia'));
    }


    public function create(){
        $iconos = Icons::all();
        return view('back.dependencias.create', compact('iconos'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'secretaria' => 'required|unique:dependencias',
            'secretario' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'mapa' => 'required',
            'icono' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar la dependencia, favor de verificar los campos', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.dependencia.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
       
        try {

            $data = new Dependencias;
            $data->fill($request->all());
            $data->aprobado = $request->boolean('aprobado');
            $data->icon_id = $request->icono;
            $data->save();

            Toastr::success('Dependencia registrada con éxito', 'Success' ,['closeButton' => true]);
            return redirect(route('sistema.dependencia.index'));


        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar una dependencia: '.$e);
            Toastr::error('Lo sentimos ocurrio un error al registrar favor de intentar de nuevo', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.dependencia.create'))  
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function edit(Dependencias $dependencia){
        $iconos = Icons::all();
        return view('back.dependencias.edit', compact('dependencia', 'iconos'));
    }

    public function update(Request $request,Dependencias $dependencia){
        $validator = Validator::make($request->all(),[
            'secretaria' => 'required|unique:dependencias,secretaria,'.$dependencia->id,
            'secretario' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'mapa' => 'required',
            'icono' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar la dependencia, favor de verificar los campos', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.dependencia.edit', $dependencia))
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
        $dependencia->fill($request->all());
        $dependencia->aprobado = $request->boolean('aprobado');
        $dependencia->icon_id = $request->icono;
        $dependencia->save();

        Toastr::success('Dependencia editada con éxito', 'Success' ,['closeButton' => true]);
        return redirect(route('sistema.dependencia.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar una dependencia: '.$e);
            Toastr::error('Lo sentimos ocurrio un error al registrar favor de intentar de nuevo', 'Error' ,['closeButton' => true]);
            
            return redirect(route('sistema.dependencia.edit', $dependencia));
        }

    }
}
