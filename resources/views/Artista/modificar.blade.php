@extends('Templates.navbar')

@section('title')
<title>Modificar imagen {{$imagen->id}} </title>
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-darkBG text-white shadow">
                    <div class="card-header bg-light">
                        <h4>el nuevo titulo de la imagen {{$imagen->titulo}} </h4>
                    </div>
                    <div class="card-body bg-light" >
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('Artista.update', $imagen->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Nuevo Titulo</label>
                                <input type="text" class="form-control text-white" id="titulo" name="titulo">
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-success text-white">Actualizar</button>
                                <a href="{{route('Main.home')}}" class="btn btn-danger text-white">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection