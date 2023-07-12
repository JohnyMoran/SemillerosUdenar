<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Semilleros FACING UDENAR</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <style>          
            body {
                background-image: url('fondo.png');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
                    Inicio
                </a>    
                    <header>
                        @auth
                            <span><a class="log-in-button" href="{{ route('home') }}" style="color: yellow;">Home</a></span>
                        @else
                            <a class="log-in-button" href="{{ route('login') }}" style="color: yellow;">Login</a>
                        @endauth
                    </header>
            </div>
        </nav>
            <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
                <div class="text-center">
                    <h1 class="titulo">SEMILLEROS FACING UDENAR</h1>
                    <h5>¡Bienvenido al sistema de semilleros para la faculdad de ingenieria!</h5><br>   
                    <h6>Inicie sesion para continuar</h6>      
                </div>             
            </div>    

        <footer class="pie-pg">     
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <div class="container">
                    <p>Autores: Johny Moran, Jhan Karlo O, Kevin Mora, Ronny Pantoja</p>
                    <p>© {{ date('Y') }} <a class="text-white" href="https://www.udenar.edu.co/" target="blank">Universidad de Nariño</a></p>
                </div>     
            </div>
        </footer>           
    </body>
</html>