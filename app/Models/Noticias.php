<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NoticiasGaleria;

class Noticias extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'slug',
        'tags',
        'img',
        'extracto',
        'contenido',
        'fecha',
        'aprobado',
        'noticias_categorias_id',
    ];

 

    public function galeria()
    {
        return $this->hasMany(NoticiasGaleria::class, 'noticias_id', 'id');
    }

    public function categoria(){
        return $this->hasOne(NoticiasCategorias::class, 'id', 'noticias_categorias_id');
    }
}
