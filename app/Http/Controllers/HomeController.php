<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Cuenta;

class HomeController extends Controller
{
    public function home(){
        return view('Main.home');
    }

    public function login(){
        return view('Main.login');
    }

    public function registro(){
        return view('Main.registrar');
    }
}
