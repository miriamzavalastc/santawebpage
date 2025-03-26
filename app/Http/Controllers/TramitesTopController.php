<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TramitesTop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Rule;
use File;
use Image;

class TramitesTopController extends Controller
{
    public function index(){
        $total_tramites = TramitesTop::count();
        return view('back.tramites_top.index', compact('total_tramites'));
    }

    public function create(){
        $total_tramites = TramitesTop::count();
        if($total_tramites < 4){
            return view('back.tramites_top.create');
        }else{
            Toastr::error('Se llegó al limite de Servicios Top que se pueden registrar', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.index'));
        }
       
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:tramites_tops,nombre',
            'image' => 'required|image|mimes:png',
            'descripcion' => 'required',
            'link' => 'required',
            'punto_uno_titulo' => 'required',
            'punto_uno_descripcion' => 'required',
            'punto_dos_titulo' => 'required',
            'punto_dos_descripcion' => 'required',
            'punto_tres_titulo' => 'required',
            'punto_tres_descripcion' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try{
            $data = new TramitesTop();

            //imagen
            $milisegundos = round(microtime(true) * 1000);
            $name_image = strval($milisegundos) . '.png';
            $ruta = storage_path() . '/app/public/tramites/' . $name_image;
            $img = Image::make($request->file('image'))
                ->save($ruta);
            $data->logo = '/storage/tramites/' . $name_image;

            $data->fill($request->all());
            $data->save();

            Toastr::success('Servicio Top registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar el servicio top  ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.create'))
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function edit(TramitesTop $tramites_top){
        return view('back.tramites_top.edit', compact('tramites_top'));
    }

    public function update(Request $request, TramitesTop $tramites_top){
        $validator = Validator::make($request->all(), [
            'nombre' => ['required', Rule::unique('tramites_tops', 'nombre')->ignore($tramites_top->id)],
            'descripcion' => 'required',
            'link' => 'required',
            'punto_uno_titulo' => 'required',
            'punto_uno_descripcion' => 'required',
            'punto_dos_titulo' => 'required',
            'punto_dos_descripcion' => 'required',
            'punto_tres_titulo' => 'required',
            'punto_tres_descripcion' => 'required',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar los datos del servicio top, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.edit', $tramites_top))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file('image')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:png',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al editar los datos del servicio top, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.edit', $tramites_top))
                ->withErrors($validator)
                ->withInput();
        }

        try{
            if ($request->file('image')) {
                $oldProfileImage = $tramites_top->logo;

                if ($oldProfileImage != null) {
                    $oldProfileImagePath = public_path($oldProfileImage);
                    if (file_exists($oldProfileImagePath)) {
                        unlink($oldProfileImagePath);
                    }
                }
                $milisegundos = round(microtime(true) * 1000);
                $name_image = strval($milisegundos) . '.png';
                $ruta = storage_path() . '/app/public/tramites/' . $name_image;

                $logo = Image::make($request->file('image'))
                    ->save($ruta);

                $tramites_top->logo = '/storage/tramites/' . $name_image;
            }

            $tramites_top->fill($request->all());
            $tramites_top->save();

            Toastr::success('Servicio Top Editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del servicio top: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.top.edit', $tramites_top))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
