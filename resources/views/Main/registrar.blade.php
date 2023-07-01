@extends('Templates.navbar')

@section('title')
<title>Registrarse</title>
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-darkBG text-white shadow">
                    <div class="card-header bg-light">
                        <h4>Ingrese sus datos</h4>
                    </div>
                    <div class="card-body bg-light">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="POST" action="{{route('cuentas.store')}}">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label text-white">Nombre de usuario</label>
                                <input type="text" class="form-control" id="user" name="user">
                            </div>
                             <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label text-white">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label text-white">Repita la Contraseña</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="exampleInputText" class="form-label text-white">Nombre</label>
                                    <input type="text" aria-label="Nombre" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="col">
                                    <label for="exampleInputText" class="form-label text-white">Apellido</label>
                                    <input type="text" aria-label="Apellido" class="form-control" id="apellido" name="apellido">
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-success text-white">Registrarse</button>
                                <a href="{{route('Main.home')}}" class="btn btn-danger text-white">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection