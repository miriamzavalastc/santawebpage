<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Alcalde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Image;
use File;

class AlcaldeController extends Controller
{
    public function index()
    {
        $data = Alcalde::first();
        return view('back.alcalde.index', compact('data'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',

            'seemblanza' => 'required',
        ]);

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg|dimensions:width=400,height=400',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editrar los datos del Alcalde, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.alcalde.index'))
                ->withErrors($validator)
                ->withInput();
        }
        try {

            $path = Storage::exists(storage_path().'/app/public/alcalde/');
            if (!file_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $data = Alcalde::first();

            if ($data) {
                if ($request->file('image')) {
                    $oldProfileImage = $data->img;

                    if ($oldProfileImage != null) {
                        $oldProfileImagePath = public_path($oldProfileImage);
                        if (file_exists($oldProfileImagePath)) {
                            unlink($oldProfileImagePath);
                        }
                    }
                    $milisegundos = round(microtime(true) * 1000);
                    $name_image = strval($milisegundos) . '.jpg';
                    $ruta = storage_path() . '/app/public/alcalde/' . $name_image;

                    $img = Image::make($request->file('image'))
                        ->encode('jpg', 75)
                        ->save($ruta);

                    //$profileImagePath = 'storage/' .$img->store('alcalde', 'public');
                    $data->img = '/storage/alcalde/' . $name_image;
                }
                $data->fill($request->all());
                $data->save();
            } else {
              
                $data = new Alcalde();
                $data->fill($request->all());
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.jpg';
                $ruta = storage_path() . '/app/public/alcalde/' . $name_image;
                $img = Image::make($request->file('image'))
                    ->encode('jpg', 75)
                    ->save($ruta);
                $data->img = '/storage/alcalde/' . $name_image;
                $data->save();
            }

            Toastr::success('Datos Actualizados con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.alcalde.index'));
        } catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del Alcalde: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.alcalde.index'))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
