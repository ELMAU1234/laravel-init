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
            position: relative;
        }
    
        /* Estilos para el logo responsivo */
        .logo {
            margin-bottom: 20px;
        }
    
        .logo img {
            width: 100%;
            max-width: 350px;
            height: auto;
        }
    
        /* Menú de navegación */
        nav {
            margin-top: 20px;
        }
    
        nav ul {
            list-style-type: none;
            padding: 0;
        }
    
        nav ul li {
            display: inline-block;
            margin: 0 10px;
        }
    
        nav a {
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
    
        /* Estilos del menú "hamburger" solo en pantallas pequeñas */
        .menu-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2;
        }
    
        @media (max-width: 768px) {
    
            /* Mostrar el ícono "hamburger" en pantallas pequeñas */
            .menu-toggle {
                display: block;
            }
    
            nav {
                display: none;
                position: absolute;
                top: 70px;
                right: 0;
                background-color: white;
                width: 100%;
                height: 100vh;
                text-align: center;
                z-index: 10;
            }
    
            nav ul {
                display: block;
                margin-top: 20px;
            }
    
            nav ul li {
                display: block;
                margin: 20px 0;
            }
    
            /* Mostrar el menú cuando se active el "hamburger" */
            nav.active {
                display: block;
            }
        }
    
        /* Específicamente para móviles de hasta 450px de ancho */
        @media (max-width: 450px) {
            .logo img {
                max-width: 300px;
            }
    
            .banner img {
                max-height: 200px;
            }
    
            nav ul li {
                margin: 10px 0;
            }
    
            /* Estilo para apilar videos */
            .video-container {
                flex-direction: column; /* Apila los videos en columna */
                align-items: center; /* Centra los videos */
            }
    
            .video-container iframe {
                width: 100%; /* Asegura que los videos ocupen el ancho completo */
                height: 300px; /* Altura ajustada para pantallas pequeñas */
                margin-bottom: 20px; /* Espacio entre videos */
            }
        }
    
        /* Específicamente para tabletas de 700px a 768px de ancho */
        @media (min-width: 700px) and (max-width: 768px) {
            .logo img {
                max-width: 330px;
            }
    
            .banner img {
                max-height: 350px;
            }
    
            nav ul li {
                margin: 15px 0;
            }
        }
    
        /* Banner responsivo */
        .banner {
            width: 100%;
            max-height: 450px;
            overflow: hidden;
        }
    
        .banner img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    
        .video-section {
            text-align: center;
            margin: 20px;
        }
    
        .video-section input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
        }
    
        .video-section button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    
        .video-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
    
        .video-container iframe {
            width: 48%; /* Ajusta según tus necesidades para pantallas grandes */
            height: 400px;
        }
    
        /* Asegúrate de que la video-container tenga flex-direction: column en pantallas pequeñas */
        @media (max-width: 768px) {
            .video-container {
                flex-direction: column; /* Cambiar a columna en pantallas pequeñas */
                align-items: center; /* Centrar los videos */
            }
    
            .video-container iframe {
                width: 100%; /* Hacer que los videos ocupen el ancho completo */
                margin-bottom: 20px; /* Espacio entre videos */
            }
        }
    </style>
    
</head>

<body>
    <header>
        <!-- Icono de menú "hamburger" -->
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>

        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo Music a un Click">
        </div>

        <!-- Menú de navegación -->
        <nav id="navbar">
            <ul>
                <li><a href="{{ route('welcome') }}">Inicio</a></li>
                <li>
                    <div class="dropdown">
                        <a href="{{ route('grupos.index') }}">Buscar Categoría Musical</a>
                        <div class="dropdown-content">
                            <a href="{{ route('grupos.index', ['genero_musical' => 'folklore boliviano']) }}">Folklore
                                Boliviano</a>
                            <a href="{{ route('grupos.index', ['genero_musical' => 'musica cristiana']) }}">Música
                                Cristiana</a>
                            <a href="{{ route('grupos.index', ['genero_musical' => 'cumbia']) }}">Cumbia</a>
                            <a href="{{ route('grupos.index', ['genero_musical' => 'rock']) }}">Rock</a>
                        </div>
                    </div>
                </li>
                <li><a href="https://wa.me/59169893702?text=Hola%2C%20quisiera%20solicitar%20asesoramiento"
                        target="_blank">Solicitar Asesoramiento</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner responsivo -->
    <div class="banner">
        <img src="{{ asset('imagenes/IM1.png') }}" alt="Banner Imagen">
    </div>


    <div class="video-container" id="videoContainer"></div>


    <script>
          function toggleMenu() {
            var navbar = document.getElementById('navbar');
            navbar.classList.toggle('active');
        }
        window.onload = function cargarVideos() {
            var video1 = localStorage.getItem('video1');
            var video2 = localStorage.getItem('video2');

            function convertirAEmbed(url) {
                var embedUrl = url;
                if (url.includes("watch?v=")) {
                    embedUrl = url.replace("watch?v=", "embed/");
                }
                if (url.includes("youtu.be")) {
                    var videoId = url.split("/").pop();
                    embedUrl = "https://www.youtube.com/embed/" + videoId;
                }
                return embedUrl;
            }

            var videoContainer = document.getElementById('videoContainer');
            videoContainer.innerHTML = '';
            if (video1) {
                var embed1 = convertirAEmbed(video1);
                var iframe1 = '<iframe src="' + embed1 + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                videoContainer.innerHTML += iframe1;
            }
            if (video2) {
                var embed2 = convertirAEmbed(video2);
                var iframe2 = '<iframe src="' + embed2 + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                videoContainer.innerHTML += iframe2;
            }
        }
    </script>

</body>

</html>
