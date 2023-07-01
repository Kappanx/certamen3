<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CuentasRequest;
use Illuminate\Support\Facades\Hash;
use Gate;

class CuentaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['autenticar','logout','store']);
    }

    /**
     * Autenticar cuenta
     */
    public function autenticar(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        
        if(Auth::attempt(['user'=>$user,'password'=>$password])){
            $request->session()->regenerate();
            return redirect()->route('Main.home');
        }

        return back()->withErrors([
            'user' => 'Datos Incorrectos',
        ])->onlyInput('user');
    }

    /**
     * Cerrar sesión
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('Main.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CuentasRequest $request)
    {
        $cuenta = new Cuenta();
        $cuenta->user = $request->user;
        $cuenta->password = Hash::make($request->password);
        $cuenta->perfil_id = 2;
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->save();
        return redirect()->route('Main.home');
    }
}
