<?php

namespace App\Http\Controllers;

use App\Models\NoticiasCategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class NoticiasCategoriasController extends Controller
{
    public function index(){
        return view('back.noticias.categorias.index');
    }

    public function show(NoticiasCategorias $noticias_categoria){
        return view('back.noticias.categorias.show', compact('noticias_categoria'));
    }

    public function create(){
        return view('back.noticias.categorias.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:noticias_categorias,nombre',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar la categoria de noticia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.categoria.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $data = new NoticiasCategorias();

            $data->fill($request->all());
            $data->slug = Str::slug($request->nombre);
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            Toastr::success('Categoria de noticia registrada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.noticias.categoria.index'));
        
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar los datos de la categoria de noticia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar la categoria de noticia favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.categoria.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(NoticiasCategorias $noticias_categoria){
        return view('back.noticias.categorias.edit', compact('noticias_categoria'));
    }


    
    public function update(Request $request, NoticiasCategorias $noticias_categoria){
        $validator = Validator::make($request->all(), [
            'nombre' =>  ['required', Rule::unique('noticias_categorias', 'nombre')->ignore($noticias_categoria->id)],
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar la categoria de noticia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.categoria.edit', $noticias_categoria))
                ->withErrors($validator)
                ->withInput();
        }

        try {

          
            $noticias_categoria->fill($request->all());
            $noticias_categoria->slug = Str::slug($request->nombre);
            $noticias_categoria->aprobado = $request->boolean('aprobado');
            $noticias_categoria->save();

            Toastr::success('Categoria de noticia editada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.noticias.categoria.index'));
        

        } catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos de la categoria de noticia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar la categoria de noticia favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.categoria.edit', $noticias_categoria))
                ->withErrors($validator)
                ->withInput();
        }
    }


}
