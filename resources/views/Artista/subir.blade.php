@extends('Templates.navbar')

@section('title')
<title>Subir foto</title>
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-light text-white shadow">
                    <div class="card-header">
                        <h4>Ingrese los datos de la foto</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{route('Artista.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label text-white">Imagen</label>
                                <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
                            </div>
                             <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label text-white">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-success text-white">Subir</button>
                                <a href="{{route('Publico.fotos')}}" class="btn btn-danger text-white">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection