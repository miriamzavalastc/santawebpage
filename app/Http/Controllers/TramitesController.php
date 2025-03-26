<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencias;
use App\Models\Iconos;
use App\Models\Tramites;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Rule;
use File;

class TramitesController extends Controller
{
    public function index(){
        return view('back.tramites.index');
    }

    public function create(){
        $dependencias = Dependencias::all();
        $iconos = Iconos::all();
        return view('back.tramites.create', compact('dependencias', 'iconos'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:tramites,nombre',
            'dependencia' => 'required',
            'tipo_tramite' => 'required',
            'folio_registro' => 'required',
            'ultima_actualizacion' => 'required',
            'descripcion' => 'required',
            'documento_que_obtiene' => 'required',
            'tiempo_de_resolucion' => 'required',
            'costo' => 'required',
            'documentos_a_presentar' => 'required',
            'icono' => 'required|exists:iconos,id',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.create'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file('archivo')) {
            $validator = Validator::make($request->all(), [
                'archivo' => 'required|mimes:pdf|max:4096'
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.create'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->boolean('presencial') == true) {
            $validator = Validator::make($request->all(), [
                'descripcion_presencial' => 'required'
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.create'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->boolean('en_linea') == true) {
            $validator = Validator::make($request->all(), [
                'descripcion_en_linea' => 'required',
                'link_en_linea' => 'required',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.create'))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->boolean('telefonico') == true) {
            $validator = Validator::make($request->all(), [
                'descripcion_telefonico' => 'required',
                'telefono' => 'required',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try{

        $path = Storage::exists(storage_path().'/app/public/tramites/');
        if (!file_exists($path)){
            File::makeDirectory(public_path().'/storage/programas', $mode = 0777, true, true);
        }

        $data = new Tramites();
        $data->fill($request->all());
        $data->slug = Str::slug($request->nombre);
        $data->frecuente = $request->boolean('frecuente');
        $data->aprobado = $request->boolean('aprobado');
        $data->presencial = $request->boolean('presencial');
        $data->en_linea = $request->boolean('en_linea');
        $data->telefonico = $request->boolean('telefonico');
        $data->requiere_inspeccion_municipal = $request->boolean('requiere_inspeccion_municipal');
        $data->dependencia_id = $request->dependencia;
        $data->iconos_id = $request->icono;


         if ($request->file('archivo')) {
                $profilePath = 'storage/' .$request->file('archivo')->store('tramites', 'public');
                $data->archivo = $profilePath;
            }
            
        $data->save();
        Toastr::success('Trámite o Servicio Registrado con éxito', 'Success', ['closeButton' => true]);
        return redirect(route('sistema.tramites.index'));



        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar el tramite o servicio  ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.create'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function edit(Tramites $tramite){
        $dependencias = Dependencias::all();
        $iconos = Iconos::all();
        return view('back.tramites.edit', compact('dependencias', 'tramite', 'iconos'));
    }

    public function update(Request $request, Tramites $tramite){
        $validator = Validator::make($request->all(), [
            'nombre' =>  ['required', Rule::unique('tramites', 'nombre')->ignore($tramite->id)],
            'dependencia' => 'required',
            'tipo_tramite' => 'required',
            'folio_registro' => 'required',
            'ultima_actualizacion' => 'required',
            'descripcion' => 'required',
            'documento_que_obtiene' => 'required',
            'tiempo_de_resolucion' => 'required',
            'costo' => 'required',
            'documentos_a_presentar' => 'required',
            'icono' => 'required|exists:iconos,id',
        ]);

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.edit', $tramite))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->file('archivo')) {
            $validator = Validator::make($request->all(), [
                'archivo' => 'required|mimes:pdf|max:4096'
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.edit', $tramite))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->boolean('presencial') == true) {
            $validator = Validator::make($request->all(), [
                'descripcion_presencial' => 'required'
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.edit', $tramite))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->boolean('en_linea') == true) {
            $validator = Validator::make($request->all(), [
                'descripcion_en_linea' => 'required',
                'link_en_linea' => 'required',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.edit', $tramite))
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->boolean('telefonico') == true) {
            $validator = Validator::make($request->all(), [
                'descripcion_telefonico' => 'required',
                'telefono' => 'required',
            ]);
        }

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.edit', $tramite))
                ->withErrors($validator)
                ->withInput();
        }

        try{

            $tramite->fill($request->all());
            $tramite->slug = Str::slug($request->nombre);
            $tramite->frecuente = $request->boolean('frecuente');
            $tramite->aprobado = $request->boolean('aprobado');
            $tramite->presencial = $request->boolean('presencial');
            $tramite->en_linea = $request->boolean('en_linea');
            $tramite->telefonico = $request->boolean('telefonico');
            $tramite->requiere_inspeccion_municipal = $request->boolean('requiere_inspeccion_municipal');
            $tramite->dependencia_id = $request->dependencia;
            $tramite->iconos_id = $request->icono;
    
             if ($request->file('archivo')) {
                    $profilePath = 'storage/' .$request->file('archivo')->store('tramites', 'public');
                    $tramite->archivo = $profilePath;
                }
                
            $tramite->save();
            Toastr::success('Trámite o Servicio Editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.tramites.index'));


        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar el tramite o servicio  ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.tramites.edit', $tramite))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
