<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Dependencias;
use Illuminate\Http\Request;
use App\Models\Icons;
use App\Models\TitularesDependencias;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use File;

class TitularesDependenciasController extends Controller
{
    public function index()
    {
        return view('back.titulares_dependencias.index');
    }

    public function show(TitularesDependencias $titulares_dependencia){
        return view('back.titulares_dependencias.show', compact('titulares_dependencia'));
    }


    public function create()
    {
        $dependencias = Dependencias::all();
        return view('back.titulares_dependencias.create', compact('dependencias'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'seemblanza' => 'required',
            'correo' => 'required|email',
            'extension' => 'required',
            'telefono' => 'required',
            'cargo' => 'required',
            'dependencia' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=400,height=600',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del Titular de Dependencia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.titulares.dependencia.create'))
                ->withErrors($validator)
                ->withInput();
        }
        $path = Storage::exists(storage_path().'/app/public/titular-dependencia/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }

        $data = new TitularesDependencias();

        $milisegundos = round(microtime(true) * 1000);
        $name_image = strval($milisegundos) . '.jpg';
        $ruta = storage_path() . '/app/public/titular-dependencia/' . $name_image;
        $img = Image::make($request->file('image'))
            ->encode('jpg', 75)
            ->save($ruta);
        $data->img = '/storage/titular-dependencia/' . $name_image;
        $data->fill($request->all());
        $data->aprobado = $request->boolean('aprobado');
        $data->dependencia_id = $request->dependencia;
        $data->save();

        Toastr::success('Titular de Dependencia registrado con éxito', 'Success', ['closeButton' => true]);
        return redirect(route('sistema.titulares.dependencia.index'));

        try {
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar los datos del Titular de Dependencia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el Titular de Dependencia favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.titulares.dependencia.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(TitularesDependencias $titulares_dependencia){
        $dependencias = Dependencias::all();
        return view('back.titulares_dependencias.edit', compact('titulares_dependencia', 'dependencias'));
    }

    public function update(Request $request, TitularesDependencias $titulares_dependencia){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'seemblanza' => 'required',
            'correo' => 'required|email',
            'extension' => 'required',
            'telefono' => 'required',
            'cargo' => 'required',
            'dependencia' => 'required',
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=400,height=600',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar los datos del Titular de Dependencia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.titulares.dependencia.edit', $titulares_dependencia))
                ->withErrors($validator)
                ->withInput();
        }
        try {

            if ($request->file('image')) {
                $oldProfileImage = $titulares_dependencia->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/titular-dependencia/' . $name_image;

                $img = Image::make($request->file('image'))
                    ->encode('jpg', 75)
                    ->save($ruta);

                //$profileImagePath = 'storage/' .$img->store('alcalde', 'public');
                $titulares_dependencia->img = '/storage/titular-dependencia/' . $name_image;
            }
            $titulares_dependencia->fill($request->all());
            $titulares_dependencia->aprobado = $request->boolean('aprobado');
            $titulares_dependencia->save();

            Toastr::success('Datos Actualizados con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.titulares.dependencia.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del Titular de Dependencia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.titulares.dependencia.index'))
                ->withErrors($validator)
                ->withInput();
        }

    }
}
