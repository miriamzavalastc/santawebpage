<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Icons;

class IconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Icons::create([
            'nombre' => 'Naranja',
            'icono' => '/img/icons/naranja.svg',
            'color' => '#ea5b0c'
        ]);
        Icons::create([
            'nombre' => 'Amarillo',
            'icono' => '/img/icons/amarillo.svg',
            'color' => '#ffd600'
        ]);
        Icons::create([
            'nombre' => 'Verde',
            'icono' => '/img/icons/verde.svg',
            'color' => '#18988b'
        ]);
        Icons::create([
            'nombre' => 'Rojo',
            'icono' => '/img/icons/rojo.svg',
            'color' => '#ea5659'
        ]);
        Icons::create([
            'nombre' => 'Rosa',
            'icono' => '/img/icons/rosa.svg',
            'color' => '#dd85ba'
        ]);
    }
}
