@extends('Templates.navbar')

@section('title')
<title>Cuentas en el sistema</title>
@endsection

@section('content')
    <div class="row mb-3 mt-5">
    <h3>Listado de cuentas</h3>
    <br>
    </div>
    
    <div class="mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Perfil</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuentas as $user=>$cuenta)
                        <tr>
                            <td class="align-middle">{{ $cuenta->user }}</td>
                            <td class="align-middle">{{ $cuenta->nombre }}</td>
                            <td class="align-middle">{{ $cuenta->apellido }}</td>
                            <td class="align-middle">@if($cuenta->perfil_id == 1)Administrador @else Usuario @endif</td>
                            <td>
                                <div class="row">
                                    {{-- Borrar --}}
                                    
                                    <div class="col text-end">
                                        <button type="button" @if($cuenta->perfil_id == auth()->user()->perfil_id) disabled @endif class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#destroyModal{{$cuenta->user}}">Borrar</button>
                                    </div>
                                    <div class="modal fade" id="destroyModal{{ $cuenta->user }}" tabindex="-1" aria-labelledby="destroyModalLabel{{ $cuenta->user }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('Admin.destroy', $cuenta->user) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="destroyModalLabel{{ $cuenta->user }}">Esta seguro?</h1>
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
                                    {{-- Editar --}}
                                    <div class="col text-center">
                                        <a href="{{ route('Admin.editar', $cuenta->user) }}" class="btn btn-info text-white">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection