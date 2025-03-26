<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ConfiguracionController extends Controller
{
    public function index()
    {
        $data = Configuracion::first();
        return view('back.configuracion.index', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'veda' => 'boolean',
            'email_contact' => 'required',
            'phone_contact' => 'required',
            'address_contact' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar la configuracion, favor de verificar los campos', 'Error' ,['closeButton' => true]);
            return redirect(route('sistema.configuracion.index'))
                        ->withErrors($validator)
                        ->withInput();
        }

        if($id == 0){
            $data = new Configuracion();
            $data->veda = $request->boolean('veda');
            $data->email_contact = $request->email_contact;
            $data->phone_contact = $request->phone_contact;
            $data->address_contact = $request->address_contact;
            $data->save();

        }else{
            $data = Configuracion::find($id);
            $data->veda = $request->boolean('veda');
            $data->email_contact = $request->email_contact;
            $data->phone_contact = $request->phone_contact;
            $data->address_contact = $request->address_contact;
            $data->save();
        }

        Toastr::success('Configuración editada con éxito', 'Success', ['closeButton' => true]);
        return redirect(route('sistema.configuracion.index'));
    }
}
