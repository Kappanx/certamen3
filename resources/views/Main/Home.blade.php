<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/custom-colors.min.css') }}">
</head>
<body class="bg-light" data-bs-theme="dark">
  
    <div class="container-fluid">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-dark mb-5 shadow">
            <div class="container-xl">
                <a class="navbar-brand" href="#"><img src="{{ asset('imgs/Xphotos.svg') }}" alt="" width="200"></a>
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
                        <a href="{{route('cuentas.logout')}}" ><button class="btn text-white btn-outline-white" type="submit">Cerrar Sesion</button></a>
                    @elseif(auth()->check() && auth()->user()->perfil_id == 1)
                        <a class="text-white">Sesion de Administrador: {{Auth::user()->nombre}}</a>
                        <a href="{{route('Admin.cuentas')}}"><button class="btn text-white btn-outline-white" type="submit">Ver Cuentas</button></a>
                        <a href="{{route('cuentas.logout')}}" ><button class="btn text-white btn-outline-white" type="submit">Cerrar Sesion</button></a>
                    @else
                        <a href="{{route('Main.login')}}" ><button class="btn text-white btn-outline-white" type="submit">Iniciar Sesion</button></a>
                        <a href="{{route('Main.registrar')}}" ><button class="btn text-white btn-outline-white" type="submit">Registrarse</button></a>
                    @endif
                </div>
            </div>
        </nav>
        <div class="container-xl">
            <!-- Info -->
            <div class="row mb-3">
                <div class="col-lg-8">
                    <h1 class="text-white"><b class="text-danger">Xtreme</b> Photos!</h3>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla molestie volutpat porttitor. Praesent eleifend facilisis dignissim. Integer et iaculis sem, sit amet sagittis velit. Sed eu justo est. Phasellus at libero sodales, luctus diam finibus, laoreet augue</p>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="card shadow bg-light text-center">
                    <img src="{{ asset('imgs/camera.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Imagenes</h5>
                        <p class="card-text"></p>
                        <a href="{{route('Publico.fotos')}}" class="btn d-grid text-white btn-success">Ir</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>