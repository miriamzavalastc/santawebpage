<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\EventosCategorias;
use Illuminate\Support\Str as Str;
use File;

class EventosCategoriasController extends Controller
{
    public function index(){
        return view('back.eventos.categorias.index');
    }

    public function show(EventosCategorias $eventos_categoria){
        return view('back.eventos.categorias.show', compact('eventos_categoria'));
    }


    public function create(){
        return view('back.eventos.categorias.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar la categoria del evento, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.categoria.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $data = new EventosCategorias();

            if ($request->file('image')) {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:svg',
                ]);
                $path = Storage::exists(storage_path().'/app/public/eventos/categoria');
                if (!file_exists($path)){
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                $img = $request->file('image')->store('public/eventos/categoria');
                $data->icono = Storage::url($img);
            }
            $data->fill($request->all());
            $data->slug = Str::slug($request->nombre);
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            Toastr::success('Categoria del Evento registrada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.eventos.categoria.index'));
        
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar los datos de la categoria del evento: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar la categoria del evento favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.categoria.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(EventosCategorias $eventos_categoria){
        return view('back.eventos.categorias.edit', compact('eventos_categoria'));
    }

    public function update(Request $request, EventosCategorias $eventos_categoria){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar la categoria del evento, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.categoria.edit', $eventos_categoria))
                ->withErrors($validator)
                ->withInput();
        }

        try {

            if ($request->file('image')) {

                $oldProfileImage = $eventos_categoria->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }

                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:svg',
                ]);
                $img = $request->file('image')->store('public/eventos/categoria');
                $eventos_categoria->icono = Storage::url($img);
            }
            $eventos_categoria->fill($request->all());
            $eventos_categoria->slug = Str::slug($request->nombre);
            $eventos_categoria->aprobado = $request->boolean('aprobado');
            $eventos_categoria->save();

            Toastr::success('Categoria del Evento editada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.eventos.categoria.index'));
        

        } catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos de la categoria del evento: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar la categoria del evento favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.categoria.edit', $eventos_categoria))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
