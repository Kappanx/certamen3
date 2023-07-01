@extends('Templates.navbar')

@section('title')
<title>Editar</title>
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-darkBG text-white shadow">
                    <div class="card-header bg-light">
                        <h4>Ingrese sus nuevos datos</h4>
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
                        <form method="POST" action="{{route('Admin.edit',$cuenta->user)}}">
                        @method('put')
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label text-white">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label text-white">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido">
                            </div>
                            <div class="row mb-3">
                            <div class="mb-3">
                                <label class="form-label" for="perfil_id">Tipo de perfil</label>
                                <select id="perfil_id" name="perfil_id" class="form-control">
                                    <option value="2" selected >Usuario</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-success text-white">Confirmar</button>
                                <a href="{{route('Main.home')}}" class="btn btn-danger text-white">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection