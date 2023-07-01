@extends('Templates.navbar')

@section('title')
<title>Fotos</title>
@endsection

@section('content')
    <div class="row mb-3 mt-5">
        <div class="col-3">
            <h3>Imagenes de artistas</h3>
            <br>
            @if(auth()->check() && auth()->user()->perfil_id == 2)
                <a href="{{route('Artista.subir')}}" class="btn d-grid btn-success mt-2 text-white">subir fotos</a>
            @endif
        </div>
    </div>
    
    <div class="grid-container mt-2">
        <div class="row">
        @auth
            @if(auth()->user()->perfil_id == 1)
                @foreach($imagenes as $imagen)
                    <div class="col-3">
                        <div class="card bg-light shadow mb-4">
                            <img src="{{ asset('user_imgs/' . $imagen->archivo ) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-white ">{{ $imagen->titulo }}</h5>
                                <p class="card-text text-white ">{{ $imagen->cuenta_user }}</p>
                                @if ($imagen->baneada == 1)
                                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#unbanModal{{$imagen->id}}">Desbanear</button>
                                @else
                                    <a href="{{route('Admin.banear',$imagen->id)}}" class="btn btn-danger text-white">Banear</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="unbanModal{{ $imagen->id }}" tabindex="-1" aria-labelledby="unbanModalLabel{{ $imagen->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('Admin.unban',$imagen->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="unbanModalLabel{{ $imagen->id }}">Esta seguro?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Confirmar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($imagenes as $imagen)
                    @if($imagen->baneada != 1)
                        <div class="col-3">
                            <div class="card bg-light shadow mb-4">
                                <img src="{{ asset('user_imgs/' . $imagen->archivo ) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-white ">{{ $imagen->titulo }}</h5>
                                    <p class="card-text text-white ">{{ $imagen->cuenta_user }}</p>
                                    @if (auth()->check() && auth()->user()->perfil_id == 2 && auth()->user()->user == $imagen->cuenta_user )
                                        <a href="{{route('Artista.modificar',$imagen->id)}}" class="btn d-grid text-white btn-info mt-2">Modificar</a>
                                        <a href="#" class="btn d-grid text-white btn-warning mt-2">borrar</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @else
            @foreach($imagenes as $imagen)
                @if($imagen->baneada != 1)
                <div class="col-3">
                    <div class="card bg-light shadow mb-4">
                        <img src="{{ asset('user_imgs/' . $imagen->archivo ) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white ">{{ $imagen->titulo }}</h5>
                            <p class="card-text text-white ">{{ $imagen->cuenta_user }}</p>
                            @if (auth()->check() && auth()->user()->perfil_id == 2 && auth()->user()->user == $imagen->cuenta_user )
                                <a href="{{route('Artista.modificar',$imagen->id)}}" class="btn d-grid text-white btn-info mt-2">Modificar</a>
                                <a href="#" class="btn d-grid text-white btn-warning mt-2">borrar</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endauth
        
        </div>
    </div>
@endsection
    