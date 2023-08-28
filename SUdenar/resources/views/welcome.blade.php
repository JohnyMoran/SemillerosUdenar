<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Semilleros FACING UDENAR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            margin: 0;
        }
        .animation-frame {
            width: 100%;
            height: 100%;
            border: none;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
        .bg {
            animation: slide 3s ease-in-out infinite alternate;
            background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
            bottom: 0;
            left: -50%;
            opacity: 0.5;
            right: -50%;
            top: 0;
            z-index: -1;
        }
        .bg2 {
            animation-direction: alternate-reverse;
            animation-duration: 4s;
        }
        .bg3 {
            animation-duration: 5s;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 10px 0;
            text-align: center;
        }
        @keyframes slide {
            0% {
                transform: translateX(-5%);
            }
            100% {
                transform: translateX(5%);
            }
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1;
            width: 100%;
            padding: 20px;
        }
        .titulo {
            font-size: 5.8em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #ff0;
            animation: appear 2s ease-in-out forwards, perspective 4s alternate infinite;
            opacity: 0;
        }

        @keyframes perspective {
            0% {
                transform: perspective(1000px) rotateY(0deg);
            }
            50% {
                transform: perspective(1000px) rotateY(180deg);
            }
            100% {
                transform: perspective(1000px) rotateY(360deg);
            }
        }
        .subtitulo {
            font-size: 3em;
            color: #555;
            margin-bottom: 20px;
        }
        @keyframes appear {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @keyframes shadow-move {
            0% {
                text-shadow: 3px 3px 5px #666;
            }
            50% {
                text-shadow: 6px 6px 10px #888;
            }
            100% {
                text-shadow: 3px 3px 5px #666;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Inicio
            </a>
            @auth
                <span><a class="log-in-button" href="{{ url('/admin') }}">Home</a></span>
            @else
                <a class="log-in-button" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>
    <iframe src="{{ asset('animations/index.html') }}" frameborder="0" class="animation-frame"></iframe>
    
    <div class="content">
        <div class="titulo">SEMILLEROS FACING UDENAR</div>
        <div class="subtitulo">¡Bienvenido al sistema de semilleros para la facultad de ingeniería!</div>
        
        @auth
            <a class="login-button" href="{{ url('/admin') }}">Home</a>
        @else
            <a class="login-button" href="{{ route('login') }}">Login</a>
        @endauth
    </div>

    <div class="footer">
        <div class="container">
            <p>Autores: Johny Moran, Jhan Karlo O, Kevin Mora, Ronny Pantoja</p>
            <p>© {{ date('Y') }} <a class="text-white" href="https://www.udenar.edu.co/" target="blank">Universidad de Nariño</a></p>
        </div>
    </div>
</body>
</html>