<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class PublicController extends Controller
{
    
    public function index(){
        $imagenes = Imagen::all();
        return view('Publico.fotos',compact('imagenes'));
    }
}
