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
                        <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal{{$imagen->id}}">borrar</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteModal{{ $imagen->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $imagen->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{route('Artista.delete',$imagen->id)}}" method="POST">
                        @method('delete')
                        @csrf
                         <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel{{ $imagen->id }}">Esta seguro?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Confirmar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
        </div>
    </div>
@endsection