<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcalde extends Model
{
    use HasFactory;
    protected $table = "alcalde";
    
    protected $fillable = [
        'nombre',
        'img',
        'seemblanza'
    ]; 
}
