@extends('Templates.navbar')

@section('title')
<title>Fotos Baneadas</title>
@endsection

@section('content')
    <div class="row mb-3 mt-5">
    <h3>Imagenes baneadas de {{Auth::user()->nombre}}</h3>
    <br>
    </div>
    <div class="row mb-3">
        <div class="col-2">
            @auth
                <a href="{{route('Artista.perfil',Auth::user()->user)}}" class="btn d-grid btn-warning text-white mt-2">volver</a>
            @endauth
        </div>
    </div>
    
    <div class="mt-5">
        <div class="row">
        @foreach($imagenes as $imagen)
        @if(auth()->check() && auth()->user()->user == $imagen->cuenta_user && $imagen->baneada == 1)
            <div class="col-3">
                <div class="card shadow">
                    <img src="{{ asset('user_imgs/' . $imagen->archivo ) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-white">{{ $imagen->titulo }}</h5>
                        <p class="card-text text-danger">motivo del ban: {{ $imagen->motivo_ban }}</p>
                        <a href="{{route('Artista.modificar',$imagen->id)}}" class="btn d-grid text-white btn-info mt-2">Modificar</a>
                        <a href="#" class="btn d-grid text-white btn-warning mt-2">borrar</a>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
        </div>
    </div>
@endsection