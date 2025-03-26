<?php

namespace App\Http\Controllers;

use App\Models\Transparencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;

class TransparenciaController extends Controller
{
    public function index(){
        return view('back.transparencia.index');
    }

    public function create(){
        return view('back.transparencia.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar el link, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.transparencia.create'))
            ->withErrors($validator)
            ->withInput();
        }

        try {
            $data = new Transparencia();
            $data->fill($request->all());
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            Toastr::success('Link registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.transparencia.index'));
        
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar el link: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el link favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.transparencia.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(Transparencia $transparencium){
        return view('back.transparencia.edit', compact('transparencium'));
    }

    public function update(Request $request, Transparencia $transparencium){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar el link, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.transparencia.edit', compact('transparencium')))
            ->withErrors($validator)
            ->withInput();
        }

        try {
           
            $transparencium->fill($request->all());
            $transparencium->aprobado = $request->boolean('aprobado');
            $transparencium->save();

            Toastr::success('Link editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.transparencia.index'));
        
        } catch (\Exception $e) {
            Log::error('ocurrio un error al editar el link: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar el link favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.transparencia.edit', compact('transparencium')))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
