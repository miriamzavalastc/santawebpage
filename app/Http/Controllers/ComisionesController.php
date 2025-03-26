<?php

namespace App\Http\Controllers;

use App\Models\Comisiones;
use App\Models\Icons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class ComisionesController extends Controller
{
    public function index(){
        return view('back.comisiones.index');
    }

    public function show(Comisiones $comisione){
        return view('back.comisiones.show', compact('comisione'));
    }

    public function create(){
        $iconos = Icons::all();
        return view('back.comisiones.create', compact('iconos'));
    }

    public function store(Request $request){
       $validator = Validator::make($request->all(),[
            'nombre' => 'required|unique:comisiones',
            'presidente' => 'required',
            'secretario' => 'required',
            'vocal' => 'required',
            'tipo' => 'required',
            'icono' => 'required',
        ]);

        
        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrió un error al registrar la comisión, favor de verificar los campos', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.comisiones.create'))
                        ->withErrors($validator)
                        ->withInput(); 
        }
        try {
            $data = new Comisiones();
            $data->fill($request->all());
            $data->aprobado = $request->boolean('aprobado');
            $data->icon_id = $request->icono;
            $data->save();

            Toastr::success('Comisión registrada con éxito', 'Success' ,['closeButton' => true]);
            return redirect(route('sistema.comisiones.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar una comisión: '.$e);
            Toastr::error('Lo sentimos ocurrio un error al registrar favor de intentar de nuevo', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.comisiones.create'))
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function edit(Comisiones $comisione){
        $iconos = Icons::all();
        return view('back.comisiones.edit', compact('iconos', 'comisione'));
    }

    public function update(Request $request, Comisiones $comisione){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|unique:comisiones,nombre,'.$comisione->id,
            'presidente' => 'required',
            'secretario' => 'required',
            'vocal' => 'required',
            'tipo' => 'required',
            'icono' => 'required',
        ]);

        
        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar la comisión, favor de verificar los campos', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.comisiones.create'))
                        ->withErrors($validator)
                        ->withInput(); 
        }
        try { 
            
            $comisione->fill($request->all());
            $comisione->aprobado = $request->boolean('aprobado');
            $comisione->icon_id = $request->icono;
            $comisione->save();
            
            Toastr::success('Comisión editada con éxito', 'Success' ,['closeButton' => true]);
            return redirect(route('sistema.comisiones.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar una dependencia: '.$e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo', 'Error' ,['closeButton' => true]);
            
            return redirect(route('sistema.comisiones.edit', $comisione));
        }
    }

}
