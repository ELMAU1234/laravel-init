<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUSIC-a un CLICK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: white;
            padding: 20px;
            text-align: center;
        }
        .logo {
            color: navy;
            font-size: 24px;
            font-weight: bold;
        }
        .logo span {
            color: #00bfff;
        }
        nav {
            margin-top: 20px;
        }
        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }
        .dropdown {
            display: inline-block;
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 160px;
            z-index: 1;
        }
        .dropdown-content a {
            display: block;
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #f0f0f0;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover a {
            color: #00bfff;
        }
        /* Estilo para la barra de búsqueda */
        .search-bar {
        margin: 30px auto;
        width: 100%;
        max-width: 600px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-bar form {
        display: flex;
        width: 100%;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 50px;
        overflow: hidden;
    }

    .search-bar input[type="text"] {
        width: 80%;
        padding: 15px 20px;
        border: none;
        outline: none;
        font-size: 16px;
        border-radius: 50px 0 0 50px;
        background-color: #f0f0f0;
        transition: background-color 0.3s ease;
    }

    .search-bar input[type="text"]:focus {
        background-color: #e0e0e0;
    }

    .search-bar button {
        width: 20%;
        background-color: #00bfff;
        color: white;
        border: none;
        padding: 15px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-radius: 0 50px 50px 0;
    }

    .search-bar button:hover {
        background-color: #007acc;
    }

    .search-bar button:focus {
        outline: none;
    }
        /* Estilo para el artista */
        .artist {
            background-color: white;
            margin: 20px auto;
            padding: 30px;
            max-width: 800px;
            display: flex;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .artist img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 20px;
        }
        .artist-info {
            flex-grow: 1;
        }
        .artist-info h2 {
            margin: 0 0 10px;
            font-size: 24px;
            color: #333;
        }
        .artist-info p {
            text-align: justify;
            color: #555;
        }
        /* Redes sociales y botones */
        .social-icons-buttons {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        .social-icons {
            display: flex;
            gap: 10px;
        }
        .social-icons a {
            text-decoration: none;
        }
        .social-icons img {
            width: 30px;
            height: 30px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .buttons a {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .buttons a:hover {
            background-color: #00bfff;
        }
    </style>
</head>
<body>
    <header>
        <!--<div class="logo">MUSIC-<span>a un CLICK</span></div>-->
        <div class="logo">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo Music a un Click" style="width: 350px; height: auto;">
        </div>
        <nav>
            <a href="{{ route('welcome') }}">Inicio</a>
            <!--<a href="#">Buscar Artista(s)</a>-->
            <div class="dropdown">
                <a href="{{ route('grupos.index') }}">Buscar Categoría Musical</a>
                <div class="dropdown-content">
                    <a href="{{ route('grupos.index', ['genero_musical' => 'folcklore boliviano']) }}">Folklore Boliviano</a>
                    <a href="{{ route('grupos.index', ['genero_musical' => 'musica cristiana']) }}">Música Cristiana</a>
                    <a href="{{ route('grupos.index', ['genero_musical' => 'cumbia']) }}">Cumbia</a>
                    <a href="{{ route('grupos.index', ['genero_musical' => 'rock']) }}">Rock</a>
                </div>
            </div>
            
            <a href="#">Solicitar Asesoramiento</a>
        </nav>
    </header>
    
    <!--buscador-->
<div class="search-bar">
    <form action="{{ route('grupos.buscar') }}" method="GET">
        <input type="text" name="search" placeholder="Buscar grupo o descripción"
               value="{{ request()->get('search') }}">
        <button type="submit">Buscar</button>
    </form>
</div>


    <!-- aquí se mostrarán los grupos filtrados -->
@if($grupos->isNotEmpty())
<div>
    @foreach ($grupos as $grupo)
        <div class="artist">
            <img src="{{ asset($grupo->imagen) }}" alt="{{ $grupo->nombre }}" class="artist-image">
            <div class="artist-info">
                <h2>{{ strtoupper($grupo->nombre) }}</h2>
                <p>{{ $grupo->descripcion }}</p>
                <p><strong>Género:</strong> {{ strtoupper($grupo->genero_musical) }}</p>
                <div class="social-icons-buttons">
                    <div class="social-icons">
                        {{-- Validación para Facebook --}}
                        @if($grupo->url_facebook)
                            <a href="{{ $grupo->url_facebook }}" target="_blank">
                                <img src="/imagenes/facebook.png" alt="Facebook">
                            </a>
                        @else
                            <span title="El grupo no cuenta con esta red social">
                                <img src="/imagenes/facebook.png" alt="Facebook no disponible" style="opacity: 0.5;">
                            </span>
                        @endif

                        {{-- Validación para TikTok --}}
                        @if($grupo->url_tiktok)
                            <a href="{{ $grupo->url_tiktok }}" target="_blank">
                                <img src="/imagenes/tik-tok.png" alt="TikTok">
                            </a>
                        @else
                            <span title="El grupo no cuenta con esta red social">
                                <img src="/imagenes/tik-tok.png" alt="TikTok no disponible" style="opacity: 0.5;">
                            </span>
                        @endif

                        {{-- Validación para Instagram --}}
                        @if($grupo->url_instagram)
                            <a href="{{ $grupo->url_instagram }}" target="_blank">
                                <img src="/imagenes/instagram.png" alt="Instagram">
                            </a>
                        @else
                            <span title="El grupo no cuenta con esta red social">
                                <img src="/imagenes/instagram.png" alt="Instagram no disponible" style="opacity: 0.5;">
                            </span>
                        @endif

                        {{-- Validación para YouTube --}}
                        @if($grupo->url_youtube)
                            <a href="{{ $grupo->url_youtube }}" target="_blank">
                                <img src="/imagenes/youtube.png" alt="YouTube">
                            </a>
                        @else
                            <span title="El grupo no cuenta con esta red social">
                                <img src="/imagenes/youtube.png" alt="YouTube no disponible" style="opacity: 0.5;">
                            </span>
                        @endif
                    </div>

                    <div class="buttons">
                        <a href="#" class="btn btn-stats">Ver estadísticas</a>
                        <a href="https://wa.me/{{ $grupo->contacto_whatsapp }}" target="_blank" class="btn btn-contact">CONTACTAR</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
<p>No se encontraron resultados para tu búsqueda.</p>
@endif


    
</body>
</html>
