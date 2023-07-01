@extends('Templates.navbar')

@section('title')
<title>Fotos Personales</title>
@endsection

@section('content')
    <div class="row mb-3 mt-5">
    <h3>Imagenes de {{Auth::user()->user}}</h3>
    <br>
    </div>
    <div class="row mb-3">
        <div class="col-2">
            @auth
                <a href="{{route('Artista.subir')}}" class="btn d-grid btn-success mt-2 text-white">subir fotos</a>
            @endauth
        </div>
        <div class="col-2">
            @auth
                <a href="{{route('Artista.baneadas',Auth::user()->user)}}" class="btn d-grid btn-warning mt-2 text-white">ver baneadas</a>
            @endauth
        </div>
    </div>
    
    <div class="mt-5">
        <div class="row">
        @foreach($imagenes as $imagen)
        @if(auth()->check() && auth()->user()->user == $imagen->cuenta_user && $imagen->baneada != 1)
            <div class="col-3">
                <div class="card shadow">
                    <img src="{{ asset('user_imgs/' . $imagen->archivo ) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $imagen->titulo }}</h5>
                        <p class="card-text">{{ $imagen->cuenta_user }}</p>
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