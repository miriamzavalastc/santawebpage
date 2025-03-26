<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;

class DirectorioController extends Controller
{
    public function index()
    {
        return view('back.directorio.index');
    }

    public function show(Directorio $directorio)
    {
        return view('back.directorio.show', compact('directorio'));
    }

    public function create()
    {
        return view('back.directorio.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'departamento' => 'required',
            'lugar' => 'required',
            'ubicacion' => 'required',
            'telefono' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del Directorio, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.directorio.create'))
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = new Directorio();
            $data->fill($request->all());
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            Toastr::success('Directorio registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.directorio.index'));
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar los datos del Directorio: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el Directorio favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.directorio.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(Directorio $directorio)
    {
        return view('back.directorio.edit', compact('directorio'));
    }

    public function update(Request $request, Directorio $directorio)
    {
        $validator = Validator::make($request->all(), [
            'departamento' => 'required',
            'lugar' => 'required',
            'ubicacion' => 'required',
            'telefono' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar los datos del Directorio, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.directorio.edit', $directorio))
                ->withErrors($validator)
                ->withInput();
        }

        try {
          
            $directorio->fill($request->all());
            $directorio->aprobado = $request->boolean('aprobado');
            $directorio->save();

            Toastr::success('Directorio editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.directorio.index'));
        } catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del Directorio: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar el Directorio favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.directorio.edit'))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
