<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comisiones extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'presidente',
        'secretario',
        'vocal',
        'tipo',
        'posicion',
        'aprobado',
        'icon_id',
    ];

    public function icono(){
        return $this->hasOne(Icons::class, 'id', 'icon_id');
   }

}
