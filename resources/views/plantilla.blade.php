<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!--    jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- librerias buscar select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <!-- ORDERNAR TABLA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js">
    </script>
    <!-- CHARTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
 <!--    Ordenar tabla -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>




    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--  css  y js -->
    <link rel="stylesheet" href="{{ asset('css/css.css') }}" />
    <script src="{{ asset('js/js.js') }}"></script>
</head>
<body>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mb-4 " aria-label="Eleventh navbar example">
            <div class="container-fluid">
                <a class="navbar-brand">EMPRESITA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample09">
                    <ul class="navbar-nav  mb-2 mb-lg-0">
                        @switch(auth()->user()->rol)
                        @case("Admin")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios')}}"><i class="  me-1 fa-solid fa-users d-lg-none d-md-block"></i>Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empleados')}}"><i class=" me-1 fa-solid fa-people-group   d-lg-none d-md-block"></i>Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('facturas')}}"><i  class=" me-1 fa-solid fa-file-invoice-dollar   d-lg-none d-md-block"></i>Facturas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('estadisticas')}}"><i class=" me-1 fa-solid fa-chart-line   d-lg-none d-md-block"></i>Estadisticas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('curriculum')}}"><i  class=" me-1 fa-solid fa-file   d-lg-none d-md-block"></i>C.V</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('clientes')}}"> <i class="fa-solid fa-briefcase d-lg-none d-md-block"></i>Clientes</a>
                        </li>
                        @break

                        @case("RRHH")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios')}}"><i class="  me-1 fa-solid fa-users d-lg-none d-md-block"></i>Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empleados')}}"><i class=" me-1 fa-solid fa-people-group   d-lg-none d-md-block"></i>Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('curriculum')}}"><i class=" me-1 fa-solid fa-file   d-lg-none d-md-block"></i>C.V</a>
                        </li>
                        @break

                        @case("Finanzas")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('facturas')}}"><i class=" me-1 fa-solid fa-file-invoice-dollar   d-lg-none d-md-block"></i>Facturas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('estadisticas')}}"><i class=" me-1 fa-solid fa-chart-line   d-lg-none d-md-block"></i>Estadisticas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('clientes')}}"> <i class="fa-solid fa-briefcase d-lg-none d-md-block"></i>Clientes</a>
                        </li>
                        @break
                        @endswitch
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                         <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('tareas')}}"><i class="fa-solid fa-list-check d-lg-none d-md-block"></i>Tareas</a>
                        </li>

                        <li class="nav-item me-1">
                             <a class="nav-link " href="{{ route('perfil')}}" data-toggle="tooltip" data-placement="bottom" title="Perfil de usuario"><i class="me-1 fa-solid fa-user-gear"></i><span class=" d-lg-none d-md-block">Perfil</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"  data-toggle="tooltip" data-bs-placement="bottom" title="Cerrar sesion"><i class="me-1  fa fa-light fa-arrow-right-from-bracket  me-1"></i><span class="   d-lg-none d-md-block ">Cerrar sesión</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <main class="container">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('contenido')
    </main>
</body>

</html>