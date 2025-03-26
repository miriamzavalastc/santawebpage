<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependencias extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'dependencias';

    protected $fillable = [
        'secretaria',
        'secretario',
        'direccion',
        'telefono',
        'correo',
        'mapa',
        'posicion',
        'aprobado',
        'icon_id',
    ];

    public function icono(){
         return $this->hasOne(Icons::class, 'id', 'icon_id');
    }
}
