<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EventosGalerias;

class Eventos extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_final' => 'datetime',
        
    ];

    protected $fillable = [
        'nombre',
        'slug',
        'fecha_inicio',
        'fecha_final',
        'hora_inicio',
        'hora_final',
        'lugar',
        'img',
        'contenido',
        'portada',
        'aprobado',
        'eventos_categorias_id',
    ];

    public function galeria(){
        return $this->hasMany(EventosGalerias::class, 'eventos_id', 'id');
   
    }

    public function categoria(){
        return $this->hasOne(EventosCategorias::class, 'id', 'eventos_categorias_id');
    }
}
