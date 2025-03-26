<?php

namespace App\Http\Controllers;

use App\Models\Iconos;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use File;

class IconosController extends Controller
{
    public function index(){
        return view('back.iconos.index');
    }

    public function show(Iconos $icono){
        return view('back.iconos.show', compact('icono'));
    }

    public function create(){
        return view('back.iconos.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:iconos,nombre',
            'image' => 'required|mimes:svg',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar el Icono, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.iconos.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $data = new Iconos();
            $data->nombre = $request->nombre;
            $img = $request->file('image')->store('public/iconos');
            $data->icono = Storage::url($img);
            $data->save();

            Toastr::success('Icono registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.iconos.index'));
        
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrarel Icono: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el icono favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.iconos.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(Iconos $icono){
        return view('back.iconos.edit', compact('icono'));
    }


    
    public function update(Request $request, Iconos $icono){
        $validator = Validator::make($request->all(), [
            'nombre' =>  ['required', Rule::unique('iconos', 'nombre')->ignore($icono->id)],
            
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar el icono, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.iconos.edit', $icono))
                ->withErrors($validator)
                ->withInput();
        }

        try {

          
            $icono->fill($request->all());
            if ($request->file('image')) {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|mimes:svg',
                ]);
                $oldProfileImage = $icono->icono;
                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $img = $request->file('image')->store('public/iconos');
                $icono->icono = Storage::url($img);
            }

            $icono->save();

            Toastr::success('Icono editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.iconos.index'));
        

        } catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos de la categoria de noticia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar el icono favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.iconos.edit', $icono))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
