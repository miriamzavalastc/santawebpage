<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Cabildo;
use Image;
use File;

class CabildoController extends Controller
{
    public function index(){
        return view('back.cabildo.index');
    }

    public function show(Cabildo $cabildo){
        return view('back.cabildo.show', compact('cabildo'));
    }

    public function create(){
        return view('back.cabildo.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'seemblanza' => 'required',
            'correo' => 'required|email',
            'extension' => 'required',
            'telefono' => 'required',
            'cargo' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=400,height=600',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del Cabildo, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.cabildo.create'))
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $path = Storage::exists(storage_path().'/app/public/cabildo/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $data = new Cabildo;
            $milisegundos = round(microtime(true) * 1000);
            $name_image = strval($milisegundos) . '.jpg';
            $ruta = storage_path() . '/app/public/cabildo/' . $name_image;
            $img = Image::make($request->file('image'))
                ->encode('jpg', 75)
                ->save($ruta);
            $data->img = '/storage/cabildo/' . $name_image;
            $data->fill($request->all());
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            Toastr::success('Cabildo registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.cabildo.index'));
    
        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar los datos del Cabildo: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el Cabildo favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.cabildo.create'))
                ->withErrors($validator)
                ->withInput();
        }
    
    }

    public function edit(Cabildo $cabildo){
        return view('back.cabildo.edit', compact('cabildo'));
    }

    public function update(Request $request, Cabildo $cabildo){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'seemblanza' => 'required',
            'correo' => 'required|email',
            'extension' => 'required',
            'telefono' => 'required',
            'cargo' => 'required',
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=400,height=600',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar el Cabildo, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.cabildo.edit', $cabildo))
                ->withErrors($validator)
                ->withInput();
        }
        try {

            if ($request->file('image')) {
                $oldProfileImage = $cabildo->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/cabildo/' . $name_image;

                $img = Image::make($request->file('image'))
                    ->encode('jpg', 75)
                    ->save($ruta);

                //$profileImagePath = 'storage/' .$img->store('alcalde', 'public');
                $cabildo->img = '/storage/cabildo/' . $name_image;
            }
            $cabildo->fill($request->all());
            $cabildo->aprobado = $request->boolean('aprobado');
            $cabildo->save();

            Toastr::success('Datos Actualizados con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.cabildo.index'));


         }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del Cabildo: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.cabildo.index'))
                ->withErrors($validator)
                ->withInput();
        }
    }

}
