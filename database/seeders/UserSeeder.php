<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
            'name' => 'Angel Medrano',
            'email' => 'medrano.angelg@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Programacion-2016'),
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole(['Administrador']);

        User::create([
            'name' => 'Marco Rodriguez',
            'email' => 'marco.rodriguezm@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('bolddigital8469'),
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole(['Administrador']);

        User::create([
            'name' => 'Hector Romero',
            'email' => 'hector.romero@stacatarina.gob.mx',
            'email_verified_at' => now(),
            'password' => Hash::make('santaDigital2023'),
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole(['Administrador']);
    }
}
