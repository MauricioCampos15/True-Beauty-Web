
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="{{ url('assets/css/menu.css') }}">
    
    <title>MENU</title>
</head>
<body>
    <header action="/index" class="header">
        @csrf
        <a href="#" class="logo">
            <img src="/IMG/logo.png" alt="">
            
        </a>
    
        <nav class="navbar navbar-default">
            
            <a style="text-decoration:none" href="#">Inicio</a>
            <a style="text-decoration:none" href="#tips">Tips</a>
            <a style="text-decoration:none" href="#about">¿Quiénes somos?</a>
            <a style="text-decoration:none" href="#servicios">Servicios</a>
            <a style="text-decoration:none" href="#">Productos</a>
            <a style="text-decoration:none" href="#redes">Redes</a>
            @guest
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-user-plus" style="color: #fdfdfd;">Ingresa</i></button>
                <div class="dropdown-content">
                    <a class="option" href="/login">Ingresar</a>
                    <a class="option" href="/register">Registrarse</a>
                </div>
            </div>
            @endguest
           
            @auth
            <div class="dropdown">
                <button class="dropbtn"> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a></button>
                <div class="dropdown-content">
                    <a class="option" href="/perfil">Editar perfil</a>

                    @can('admin.home')
                    <a class="option" href="{{ route('admin.home') }}">Dashboard</a>
                    @endcan

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="option" href="{{ route('logout') }}" onClick="event.preventDefault();
                        this.closest('form').submit();" >Cerrar sesión</a>
                    </form>
                </div>
            </div>
            @endauth

        </nav>
       
    </header>

    
    
    <script src="JS/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @yield('content')
</body>
</html>
