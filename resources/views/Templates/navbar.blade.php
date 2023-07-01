<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="{{ asset('css/custom-colors.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">

    <!-- si -->
    @yield('title')


</head>
<body class="bg-light" data-bs-theme="dark" >
    
    <div class="container-fluid">

        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg bg-dark shadow">
        <div class="container-xl">
            <a class="navbar-brand" href="{{route('Main.home')}}"><img src="{{ asset('imgs/Xphotos.svg') }}" alt="" width="200"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="{{route('Main.home')}}"><span class="text-white">Inicio</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('Publico.fotos')}}"><span class="text-white">Imagenes</span></a>
                </li>
                @if(auth()->check() && auth()->user()->perfil_id == 2)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Artista.perfil',Auth::user()->user)}}" ><span class="text-white">{{Auth::user()->user}}</span></a>
                </li>
                @elseif(auth()->check() && auth()->user()->perfil_id == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.cuentas')}}" ><span class="text-white">Cuentas</span></a>
                </li>
                @endif
                

            </ul>
            <div class="justify-content-end">
                @if(auth()->check() && auth()->user()->perfil_id == 2)
                    <a href="{{route('cuentas.logout')}}" ><button class="btn text-white btn-outline-light" type="submit">Cerrar Sesion</button></a>
                @elseif(auth()->check() && auth()->user()->perfil_id == 1)
                    <a class="text-white">Sesion de Administrador: {{Auth::user()->nombre}}</a>
                    <a href="{{route('Admin.cuentas')}}" ><button class="btn text-white btn-outline-light" type="submit">Ver Cuentas</button></a>
                    <a href="{{route('cuentas.logout')}}" ><button class="btn text-white btn-outline-light" type="submit">Cerrar Sesion</button></a>
                @else
                    <a href="{{route('Main.login')}}" ><button class="btn text-white btn-outline-light" type="submit">Iniciar Sesion</button></a>
                    <a href="{{route('Main.registrar')}}" ><button class="btn text-white btn-outline-light" type="submit">Registrarse</button></a>
                @endif
            </div>
            </div>
        </div>
        </nav>


        <!-- contenido principal -->
        <div class="container-xl">
            @yield('content')
        </div>

    </div>

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>