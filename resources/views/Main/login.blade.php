@extends('Templates.navbar')

@section('title')
<title>Inicio de sesión</title>
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-darkBG text-white shadow">
                    <div class="card-header bg-dark">
                        <h4>Inicio de sesión</h4>
                    </div>
                    <div class="card-body bg-light">

                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif

                        <form method="POST" action="{{route('cuentas.autenticar')}}">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label text-white">Nombre de usuario</label>
                                <input type="text" class="form-control text-white" id="user" name="user">
                            </div>
                             <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label text-white">Contraseña</label>
                                <input type="password" class="form-control text-white" id="password" name="password">
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-success text-white">Iniciar Sesión</button>
                                <a href="{{route('Main.home')}}" class="btn btn-danger text-white text-white">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection