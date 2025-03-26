<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PaginasGalerias;

class Paginas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'slug',
        'contenido',
        'btn_link',
        'btn_texto',
        'archivo',
        'aprobado',
    ];

    public function galeria()
    {
        return $this->hasMany(PaginasGalerias::class, 'paginas_id', 'id');
    }

}
