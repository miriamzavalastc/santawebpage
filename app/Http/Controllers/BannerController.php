<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use File;

class BannerController extends Controller
{
    public function index(){
        return view('back.banner.index');
    }

    public function create(){
        return view('back.banner.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=1920,height=850',
        ]);

        if ($request->btn_texto) {
            $validator = Validator::make($request->all(), [
                'btn_link' => 'required|url',
            ]);
        }
        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del Banner, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.banner.create'))
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $path = Storage::exists(storage_path().'/app/public/banner/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $data = new Banner;
            $milisegundos = round(microtime(true) * 1000);
            $name_image = strval($milisegundos) . '.jpg';
            $ruta = storage_path() . '/app/public/banner/' . $name_image;
            $img = Image::make($request->file('image'))
                ->encode('jpg', 75)
                ->save($ruta);
            $data->img = '/storage/banner/' . $name_image;
            $data->fill($request->all());
            $data->aprobado = $request->boolean('aprobado');
            $data->save();

            Toastr::success('Banner registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.banner.index'));
    
            
        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar el Banner: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar el Banner  favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.banner.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(Banner $banner){
        return view('back.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner){
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=1920,height=850',
            ]);
        }

        if ($request->btn_texto) {
            $validator = Validator::make($request->all(), [
                'btn_link' => 'required|url',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar el Banner, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.banner.edit', $banner))
                ->withErrors($validator)
                ->withInput();
        }

        try {

            if ($request->file('image')) {
                $oldProfileImage = $banner->img;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/banner/' . $name_image;

                $img = Image::make($request->file('image'))
                    ->encode('jpg', 75)
                    ->save($ruta);

                //$profileImagePath = 'storage/' .$img->store('alcalde', 'public');
                $banner->img = '/storage/banner/' . $name_image;
            }
            $banner->fill($request->all());
            $banner->aprobado = $request->boolean('aprobado');
            $banner->save();

            Toastr::success('Datos Actualizados con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.banner.index'));
        
        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar el Banner: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.banner.index'))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
