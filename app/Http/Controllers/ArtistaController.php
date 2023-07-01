<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImagenesRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Gate;

class ArtistaController extends Controller
{
    public function __construct(){
        $this->middleware('auth.usuario');
    }

    public function perfil(){
        $imagenes = Imagen::all();
        return view('Artista.perfil',compact('imagenes'));
    }

    public function baneadas(){
        $imagenes = Imagen::all();
        return view('Artista.baneadas',compact('imagenes'));
    }

    public function subir(){
        return view('Artista.subir');
    }

    public function modificar(Imagen $imagen){
        return view('Artista.modificar',compact('imagen'));
    }

    public function update(Request $request,Imagen $imagen){
        $imagen->titulo = $request->titulo;
        $imagen->save();
        return redirect()->route('Publico.fotos');
    }

    public function store(ImagenesRequest $request)
    {
        $imagen = new Imagen();
        $imagen->titulo = $request->titulo;
        $imagen->cuenta_user = Auth::user()->user;

        if($request->hasFile("archivo")){
            $archivo = $request->file("archivo");
            $archivoimg = Str::slug($request->titulo).".".$archivo->guessExtension();
            $ruta = public_path("user_imgs/");
            $archivo->move($ruta,$archivoimg);
            $imagen->archivo = $archivoimg;
        }

        $imagen->save();
        return redirect()->route('Main.home');
    }
}
