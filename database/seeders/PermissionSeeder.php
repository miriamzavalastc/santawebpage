<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coreAdmin = Role::create(['name' => 'Administrador']);
        $coreAdmin = Role::create(['name' => 'Home']);
        $coreAdmin = Role::create(['name' => 'Ayuntamiento']);
        $coreAdmin = Role::create(['name' => 'Noticias']);
        $coreAdmin = Role::create(['name' => 'Eventos']);
        $coreAdmin = Role::create(['name' => 'Programas']);
        $coreAdmin = Role::create(['name' => 'Tramites']);
        $coreAdmin = Role::create(['name' => 'Paginas']);
        $coreAdmin = Role::create(['name' => 'Mensajes']);
    }
}
