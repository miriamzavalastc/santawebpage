<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Noticias;
use App\Models\NoticiasCategorias;
use App\Models\NoticiasGaleria;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Rule;
use File;
use Image;

class NoticiasController extends Controller
{
    public function index()
    {
        return view('back.noticias.index');
    }

    public function create()
    {
        $categorias = NoticiasCategorias::where('aprobado', true)->get();
        return view('back.noticias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|unique:noticias,titulo',
            'tags' => 'required',
            'fecha' => 'required|date',
            'extracto' => 'required',
            'contenido' => 'required',
            'categoria' => 'required|exists:noticias_categorias,id',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos de la noticia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = new Noticias();
            //tags
            $tags = json_decode($request->tags);
            $new_tags = '';
            foreach ($tags as $i => $d) {
                $new_tags .= $d->value;
                if ($i < count($tags) - 1) {
                    $new_tags .= ', ';
                }
            }

            $path = Storage::exists(storage_path().'/app/public/noticias/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            //imagen
            $milisegundos = round(microtime(true) * 1000);
            $name_image = strval($milisegundos) . '.jpg';
            $ruta = storage_path() . '/app/public/noticias/' . $name_image;
            $img = Image::make($request->file('image'))
                ->encode('jpg', 80)
                ->save($ruta);
            $data->img = '/storage/noticias/' . $name_image;
            
            //todo
            $data->fill($request->all());
            $data->tags = $new_tags;
            $data->noticias_categorias_id = $request->categoria;
            $data->slug = Str::slug($request->titulo);
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            //galeria
            if($request->galeria){
                if(count($request->galeria)>0){
                    foreach($request->galeria as $galeria){
                        $data2 = new NoticiasGaleria();
                        $milisegundos = round(microtime(true) * 1000);
                        $name_image = strval($milisegundos) . '.jpg';
                        $ruta = storage_path() . '/app/public/noticias/' . $name_image;
                        $img = Image::make($galeria)
                            ->encode('jpg', 80)
                            ->save($ruta);
                        $data2->img = '/storage/noticias/' . $name_image;
                        $data2->noticias_id =  $data->id;
                        $data2->save();
                    }
                }
            }

            Toastr::success('Noticia registrada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.noticias.index'));
        

        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar una Noticia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar una noticia favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.create'))
                ->withErrors($validator)
                ->withInput();
        }

    }


    public function edit(Noticias $noticia)
    {
        $categorias = NoticiasCategorias::where('aprobado', true)->get();
        return view('back.noticias.edit', compact('noticia', 'categorias'));
    }

    public function update(Request $request, Noticias $noticia){
        $validator = Validator::make($request->all(), [
            'titulo' => ['required', Rule::unique('noticias', 'titulo')->ignore($noticia->id)],
            'tags' => 'required',
            'fecha' => 'required|date',
            'extracto' => 'required',
            'contenido' => 'required',
            'categoria' => 'required|exists:noticias_categorias,id',
            
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar los datos de la Noticia, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.edit', $noticia))
                ->withErrors($validator)
                ->withInput();
        }

        try{
            if ($request->file('image')) {
                $oldProfileImage = $noticia->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/noticias/' . $name_image;

                $img = Image::make($request->file('image'))
                    ->encode('jpg', 80)
                    ->save($ruta);

                $noticia->img = '/storage/noticias/' . $name_image;
            }
             //tags
             $tags = json_decode($request->tags);
             $new_tags = '';
             foreach ($tags as $i => $d) {
                 $new_tags .= $d->value;
                 if ($i < count($tags) - 1) {
                     $new_tags .= ', ';
                 }
             }

            $noticia->fill($request->all());
            $noticia->tags = $new_tags;
            $noticia->noticias_categorias_id = $request->categoria;
            $noticia->slug = Str::slug($request->titulo);
            $noticia->aprobado = $request->boolean('aprobado');
            $noticia->save();

             //galeria
             if($request->galeria){
                if(count($request->galeria)>0){
                    foreach($request->galeria as $galeria){
                        $data2 = new NoticiasGaleria();
                        $milisegundos = round(microtime(true) * 1000);
                        $name_image = strval($milisegundos) . '.jpg';
                        $ruta = storage_path() . '/app/public/noticias/' . $name_image;
                        $img = Image::make($galeria)
                            ->encode('jpg', 80)
                            ->save($ruta);
                        $data2->img = '/storage/noticias/' . $name_image;
                        $data2->noticias_id =  $noticia->id;
                        $data2->save();
                    }
                }
            }

            Toastr::success('Noticia Editada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.noticias.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos de la Noticia: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.noticias.edit', $noticia))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
