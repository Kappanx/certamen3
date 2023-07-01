<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\ImagenesRequest;
use Gate;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }

    public function banear(Imagen $imagen){
        return view('Admin.banear',compact('imagen'));
    }

    public function ban(Request $request,Imagen $imagen){
        
        $imagen->motivo_ban = $request->motivo_ban;
        $imagen->baneada = 1;
        $imagen->save();
        return redirect()->route('Publico.fotos');
    }

    public function unban(Request $request,Imagen $imagen){
        $imagen->motivo_ban = null;
        $imagen->baneada = null;
        $imagen->save();
        return redirect()->route('Publico.fotos');
    }
}
