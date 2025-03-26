<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\EventosGalerias;
use App\Models\EventosCategorias;
use App\Models\Eventos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;
use Image;
use Illuminate\Support\Str as Str;
use File;

class EventosController extends Controller
{
    public function index()
    {
        return view('back.eventos.index');
    }

    public function create()
    {
        $categorias = EventosCategorias::all();
        return view('back.eventos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:eventos,nombre',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'lugar' => 'required',
            'categoria' => 'required|exists:eventos_categorias,id',
            'contenido' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del evenot, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = new Eventos();

            $path = Storage::exists(storage_path().'/app/public/eventos/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            //imagen
            $milisegundos = round(microtime(true) * 1000);
            $name_image = strval($milisegundos) . '.jpg';
            $ruta = storage_path() . '/app/public/eventos/' . $name_image;
            $img = Image::make($request->file('image'))
                ->encode('jpg', 80)
                ->save($ruta);
            $data->img = '/storage/eventos/' . $name_image;

            //todo
            $data->fill($request->all());
            $data->slug = Str::slug($request->nombre);
            $data->eventos_categorias_id = $request->categoria;
            $data->portada = $request->boolean('portada');
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            //galeria
            if ($request->galeria) {
                if (count($request->galeria) > 0) {
                    foreach ($request->galeria as $galeria) {
                        $data2 = new EventosGalerias();
                        $milisegundos = round(microtime(true) * 1000);
                        $name_image = strval($milisegundos) . '.jpg';
                        $ruta = storage_path() . '/app/public/eventos/' . $name_image;
                        $img = Image::make($galeria)
                            ->encode('jpg', 80)
                            ->save($ruta);
                        $data2->img = '/storage/eventos/' . $name_image;
                        $data2->eventos_id = $data->id;
                        $data2->save();
                    }
                }
            }

            Toastr::success('Evento registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.eventos.index'));
        } catch (\Exception $e) {
            Log::error('ocurrio un error al registrar el Evento: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el Evento  favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(Eventos $evento)
    {
        $categorias = EventosCategorias::all();
        return view('back.eventos.edit', compact('categorias', 'evento'));
    }

    public function update(Request $request, Eventos $evento)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => ['required', Rule::unique('eventos', 'nombre')->ignore($evento->id)],
            'fecha_inicio' => 'required',
            'fecha_final' => 'required|date',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'lugar' => 'required',
            'categoria' => 'required|exists:eventos_categorias,id',
            'contenido' => 'required',
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar los datos del evenot, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.edit', $evento))
                ->withErrors($validator)
                ->withInput();
        }

        try{
            if ($request->file('image')) {
                $oldProfileImage = $evento->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/eventos/' . $name_image;

                $img = Image::make($request->file('image'))
                    ->encode('jpg', 80)
                    ->save($ruta);

                $evento->img = '/storage/eventos/' . $name_image;
            }


             //todo
             $evento->fill($request->all());
             $evento->slug = Str::slug($request->nombre);
             $evento->eventos_categorias_id = $request->categoria;
             $evento->portada = $request->boolean('portada');
             $evento->aprobado = $request->boolean('aprobado');
             $evento->save();

             //galeria
             if($request->galeria){
                if(count($request->galeria)>0){
                    foreach($request->galeria as $galeria){
                        $data2 = new EventosGalerias();
                        $milisegundos = round(microtime(true) * 1000);
                        $name_image = strval($milisegundos) . '.jpg';
                        $ruta = storage_path() . '/app/public/eventos/' . $name_image;
                        $img = Image::make($galeria)
                            ->encode('jpg', 80)
                            ->save($ruta);
                        $data2->img = '/storage/eventos/' . $name_image;
                        $data2->eventos_id =  $evento->id;
                        $data2->save();
                    }
                }
            }



            Toastr::success('Evento Editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.eventos.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del Evento: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.eventos.edit', $evento))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
