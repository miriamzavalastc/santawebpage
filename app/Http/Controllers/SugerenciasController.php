<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sugerencias;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;

class SugerenciasController extends Controller
{
    public function index(){
        return view('back.sugerencias.index');
    }

    public function show(Sugerencias $sugerencia){
        return view('back.sugerencias.show', compact('sugerencia'));
    }

    public function update(Request $request, Sugerencias $sugerencia){
        $validator = Validator::make($request->all(), [
            'estatus' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al actualizar la sugerencia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.sugerencias.show', compact('sugerencia')))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $sugerencia->estatus = $request->estatus;
            $sugerencia->save();

            Toastr::success('Sugerencia Actualizada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.sugerencias.show', compact('sugerencia')));

        } catch (\Exception $e) {
            Log::error('ocurrio un error al actualizar la sugerencia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al actualizar la sugerencia favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.sugerencias.show', compact('sugerencia')))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
