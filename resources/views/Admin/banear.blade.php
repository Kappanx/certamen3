@extends('Templates.navbar')

@section('title')
<title>Banear imagen {{$imagen->id}} </title>
@endsection

@section('content')

    <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-darkBG text-white shadow">
                    <div class="card-header bg-light">
                        <h4>Ingrese el motivo de baneo{{$imagen->id}} </h4>
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
                        <form action="{{ route('Admin.ban', $imagen->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Motivo del Baneo</label>
                                <textarea class="form-control" id="motivo_ban" name="motivo_ban"></textarea>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-danger text-white">Banear</button>
                                <a href="{{route('Main.home')}}" class="btn btn-danger text-white">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection