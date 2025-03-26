<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Paginas;
use App\Models\PaginasGalerias;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Rule;
use File;
use Image;

class PaginasController extends Controller
{
    public function index()
    {
        return view('back.paginas.index');
    }

    public function create()
    {
        return view('back.paginas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:paginas,nombre',
            'contenido' => 'required',
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
        }

        if ($request->file('archivo')) {
            $validator = Validator::make($request->all(), [
                'archivo' => 'required|mimes:pdf|max:4096'
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.paginas.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = new Paginas();

            $path = Storage::exists(storage_path().'/app/public/paginas/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }

             //imagen
             $milisegundos = round(microtime(true) * 1000);
             $name_image = strval($milisegundos) . '.jpg';
             $ruta = storage_path() . '/app/public/paginas/' . $name_image;
             $img = Image::make($request->file('image'))
                 ->encode('jpg', 80)
                 ->save($ruta);
             $data->img = '/storage/paginas/' . $name_image;
            
             //todo
            $data->fill($request->all());
            $data->slug = Str::slug($request->nombre);
            $data->aprobado = $request->boolean('aprobado');
            //archivo
            if ($request->file('archivo')) {
                $profilePath = 'storage/' .$request->file('archivo')->store('paginas', 'public');
                $data->archivo = $profilePath;
            }
            $data->save();

            //galeria
            if($request->galeria){
                if(count($request->galeria)>0){
                    foreach($request->galeria as $galeria){
                        $data2 = new PaginasGalerias();
                        $milisegundos = round(microtime(true) * 1000);
                        $name_image = strval($milisegundos) . '.jpg';
                        $ruta = storage_path() . '/app/public/paginas/' . $name_image;
                        $img = Image::make($galeria)
                            ->encode('jpg', 80)
                            ->save($ruta);
                        $data2->img = '/storage/paginas/' . $name_image;
                        $data2->paginas_id =  $data->id;
                        $data2->save();
                    }
                }
            }

            Toastr::success('Página registrada con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.paginas.index'));
        
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar una Página: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar una página favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.paginas.create'))
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function edit(Paginas $pagina){
        return view('back.paginas.edit', compact('pagina'));
    }

    public function update(Request $request,Paginas $pagina){
        $validator = Validator::make($request->all(), [
            'nombre' => ['required', Rule::unique('noticias', 'titulo')->ignore($pagina->id)],
            'contenido' => 'required',
            
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
        }

        if ($request->file('archivo')) {
            $validator = Validator::make($request->all(), [
                'archivo' => 'required|mimes:pdf|max:4096'
            ]);
        }
        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.paginas.edit', $pagina))
                ->withErrors($validator)
                ->withInput();
        }
        try{

            $pagina->fill($request->all());
            
            if ($request->file('image')) {
                $oldProfileImage = $pagina->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/paginas/' . $name_image;

                $img = Image::make($request->file('image'))
                    ->encode('jpg', 80)
                    ->save($ruta);

                $pagina->img = '/storage/paginas/' . $name_image;
            }

            

            if ($request->file('archivo')) {
                $oldFile = $pagina->archivo;

                if ($oldFile != null) {
                    $oldoldFilePath = public_path($oldFile);
                    if (file_exists($oldoldFilePath)) {
                        unlink($oldoldFilePath);
                    }
                }
                
                $profilePath = 'storage/' .$request->file('archivo')->store('paginas', 'public');
                $pagina->archivo = $profilePath;
            }

            
            $pagina->slug = Str::slug($request->nombre);
            $pagina->aprobado = $request->boolean('aprobado');
            $pagina->save();

             //galeria
             if($request->galeria){
                if(count($request->galeria)>0){
                    foreach($request->galeria as $galeria){
                        $data2 = new PaginasGalerias();
                        $milisegundos = round(microtime(true) * 1000);
                        $name_image = strval($milisegundos) . '.jpg';
                        $ruta = storage_path() . '/app/public/paginas/' . $name_image;
                        $img = Image::make($galeria)
                            ->encode('jpg', 80)
                            ->save($ruta);
                        $data2->img = '/storage/paginas/' . $name_image;
                        $data2->paginas_id =  $pagina->id;
                        $data2->save();
                    }
                }
            }

            Toastr::success('Página Editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.paginas.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos de la Página: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.paginas.edit', $pagina))
                ->withErrors($validator)
                ->withInput();
        }

    }
    
}
