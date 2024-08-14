<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(){
        return "Todas las ideas de todos los segmentos";
    }
    public function show($i, $s=null){
        if ($s === null) {
            return "Idea N° {$i}";
        }
        return "Idea N° {$i}, segmento {$s}";
    }
}
