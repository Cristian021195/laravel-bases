<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){// es el metodo ejecutado por defecto al momento de instanciar
        return view('home');//view es un helper de laravel
    }
    /*public function index(){
        return "Bienvenido a homepage";
    }*/
}
