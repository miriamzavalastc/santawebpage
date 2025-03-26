<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiasGaleria extends Model
{
    use HasFactory;

    protected $fillable = [
        'noticias_id',
        'img',
    ];
}
