<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosGalerias extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventos_id',
        'img',
    ];
}
