<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        return view('back.users.index');
    }

    public function create(){
        $roles = Role::where('guard_name', 'web')
        ->orderBy('name')
        ->get();

        return view('back.users.create', compact('roles'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|confirmed|unique:users',
            'email_confirmation' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'roles' => 'required|array',
        ],
        [],
        [
            'name' => 'Nombre',
            'email' => 'correo electrónico',
            'email_confirmation' => 'confirmación de correo electrónico',
            'password' => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
        ]);


        try {

            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->email_verified_at = now();

            // Generar contraseña
            $data->password = Hash::make($request->password);
            $data->saveOrFail();

            // Asignar el rol seleccionado al usuario
            $selectedRoles = $request->roles;
            $data->assignRole($selectedRoles);

            return redirect(route('sistema.users.index'));

        } catch (\Exception $exception) {
            return redirect(route('sistema.users.index'));
        }

    }

    public function edit($id){

        $data = User::find($id);
        $roles = Role::where('guard_name', 'web')
        ->orderBy('name')
        ->get();

        // Obtener roles del usuario
        $userRoles = $data->getRoleNames();
        $userRoles = $userRoles->toArray();

        return view('back.users.edit', compact('roles', 'data', 'userRoles'));
    }

    public function update(Request $request, $id) {

        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'confirmed', Rule::unique('users')->ignore($id)],
            'email_confirmation' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
            'roles' => 'required|array',
        ], 
        [], 
        [
            'name' => 'Nombre',
            'email' => 'correo electrónico',
            'email_confirmation' => 'confirmación de correo electrónico',
            'password' => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
        ]);

        try {

            $data = User::findOrFail($id);
            $data->name = $request->name;
            $data->email = $request->email;

            // Actualizar contraseña
            if($request->password != null) {
                $data->password = Hash::make($request->password);
            }

            $data->save();

            // Actualizar el rol
            $selectedRoles = $request->roles;
            $data->syncRoles($selectedRoles);
            

            return redirect(route('sistema.users.index'));

        } catch (\Exception $exception) {
            return redirect(route('sistema.users.index'));
        }

    }

}
