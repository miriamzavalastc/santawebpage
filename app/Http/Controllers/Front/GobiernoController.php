<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Alcalde;
use App\Models\Configuracion;
use App\Models\Dependencias;
use Illuminate\Http\Request;

class GobiernoController extends Controller
{
    public function alcalde(){
        $data = Alcalde::first();
        return view('front.gobierno.alcalde', compact('data'));
    }

    public function dependencias(){       
        return view('front.gobierno.dependencias');
    }

    public function comisiones(){       
        return view('front.gobierno.comisiones');
    }

    public function titular_dependencias(){       
        return view('front.gobierno.titular_dependencias');
    }

    public function cabildo(){       
        return view('front.gobierno.cabildo');
    }

    public function directorio(){       
        return view('front.gobierno.directorio');
    }
}
