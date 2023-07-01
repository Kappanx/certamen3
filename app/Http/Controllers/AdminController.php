<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\ImagenesRequest;
use App\Http\Requests\CuentasRequest;
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

    public function cuentas(){
        $cuentas = Cuenta::all();
        return view('Admin.cuentas',compact('cuentas'));
    }

    public function editar(Cuenta $cuenta){
        return view('Admin.editar',compact('cuenta'));
    }

    public function destroy(Cuenta $cuenta){
        
        if(auth()->user()->user == $cuenta->user){
            $cuentas = Cuenta::all();
            return redirect()->route('Admin.cuentas',compact('cuenta'));
        }

        $cuenta->delete();
        $cuentas = Cuenta::all();
        return redirect()->route('Admin.cuentas',compact('cuenta'));
    }

    public function edit(Request $request,Cuenta $cuenta){
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->perfil_id = $request->perfil_id;
        $cuenta->save();
        return redirect()->route('Publico.fotos');
    }

}
