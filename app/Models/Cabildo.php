<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cabildo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    'nombre',
    'cargo',
    'telefono',
    'extension',
    'correo',
    'img',
    'seemblanza',
    'posicion',
    'aprobado',
    ];
}
