<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencias;
use App\Models\Programas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str as Str;
use Illuminate\Validation\Rule;
use File;

class ProgramasController extends Controller
{
    public function index(){
        return view('back.programas.index');
    }

    public function descargar($id){
        $programa = Programas::find($id);
        $name_file = str_replace('storage/programas/',"", $programa->archivo);
        return response()->download(storage_path() . '/app/public/programas/'. $name_file);
     
    }

    public function show(Programas $programa){
        return view('back.programas.show', compact('programa'));
    }

    public function create(){
        $dependencias = Dependencias::all();
        return view('back.programas.create', compact('dependencias'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:programas,nombre',
            'dependencia' => 'required',
            'tipo_de_programa' => 'required',
            'objetivo' => 'required',
            'que_ofrece' => 'required',
            'a_quien_va_dirigido' => 'required',
        ]);

       

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.programas.create'))
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
            return redirect(route('sistema.programas.create'))
                ->withErrors($validator)
                ->withInput();
        }

        try{ 
            
            
            $path = Storage::exists(storage_path().'/app/public/programas/');
            if (!file_exists($path)){
                File::makeDirectory(public_path().'/storage/programas', $mode = 0777, true, true);
            }

            $data = new Programas();
            $data->fill($request->all());
            $data->slug = Str::slug($request->nombre);
            $data->aprobado = $request->boolean('aprobado');
            $data->dependencia_id = $request->dependencia;

            if ($request->file('archivo')) {
                $profilePath = 'storage/' .$request->file('archivo')->store('programas', 'public');
                $data->archivo = $profilePath;
            }
            
            $data->save();

            Toastr::success('Programa Registrado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.programas.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al registrar los datos del Programa: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al registrar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.programas.create'))
                ->withErrors($validator)
                ->withInput();
        }

    }


    public function edit(Programas $programa){
        $dependencias = Dependencias::all();
        return view('back.programas.edit', compact('dependencias', 'programa'));
    }

    public function update(Request $request, Programas $programa){
        $validator = Validator::make($request->all(), [
            'nombre' => ['required', Rule::unique('programas', 'nombre')->ignore($programa->id)],
            'dependencia' => 'required',
            'tipo_de_programa' => 'required',
            'objetivo' => 'required',
            'que_ofrece' => 'required',
            'a_quien_va_dirigido' => 'required',
        ]);

       

        if ($validator->fails()) {
            Toastr::error('Lo sentimos ocurrio un error al registrar los datos del programa, favor de verificar los campos', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.programas.edit', $programa))
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
            return redirect(route('sistema.programas.edit', $programa))
                ->withErrors($validator)
                ->withInput();
        }

        try{  

            $programa->fill($request->all());
            $programa->slug = Str::slug($request->nombre);
            $programa->aprobado = $request->boolean('aprobado');
            $programa->dependencia_id = $request->dependencia;

            if ($request->file('archivo')) {
                $oldFile = $programa->archivo;

                if ($oldFile != null) {
                    $oldoldFilePath = public_path($oldFile);
                    if (file_exists($oldoldFilePath)) {
                        unlink($oldoldFilePath);
                    }
                }
                
                $profilePath = 'storage/' .$request->file('archivo')->store('programas', 'public');
                $programa->archivo = $profilePath;
            }
            
            $programa->save();

            Toastr::success('Programa Editado con éxito', 'Success', ['closeButton' => true]);
            return redirect(route('sistema.programas.index'));

        }catch (\Exception $e) {
            Log::error('ocurrio un error al editar los datos del Programa: ' . $e);
            Toastr::error('Lo sentimos ocurrio un error al editar favor de intentar de nuevo más tarde', 'Error', ['closeButton' => true]);
            return redirect(route('sistema.programas.edit', $programa))
                ->withErrors($validator)
                ->withInput();
        }
    }

}
