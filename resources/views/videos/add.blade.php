<!DOCTYPE html>
<html lang="es">

<head>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Video</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
        .search-bar {
            margin: 20px auto;
            width: 300px;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
        }
        .artist {
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            display: flex;
        }
        .artist img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }
        .artist-info {
            flex-grow: 1;
        }
        .artist-info p {
            text-align: justify;
        }
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
        .social-icons img {
            width: 30px;
            height: 30px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .buttons button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .buttons button:hover {
            background-color: #00bfff;
        }
    </style>
</head>

<body>
    <header>
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo Music a un Click" style="width: 350px; height: auto;">
        </div>
    
        <!-- Navegación -->
        <nav>
            <a href="{{ route('welcome') }}">Inicio</a>
            <div class="dropdown">
                <a href="{{ route('grupos.index') }}">Buscar Categoría Musical</a>
                <div class="dropdown-content">
                    <a href="{{ route('grupos.index', ['genero_musical' => 'folcklore boliviano']) }}">Folklore
                        Boliviano</a>
                    <a href="{{ route('grupos.index', ['genero_musical' => 'musica cristiana']) }}">Música Cristiana</a>
                    <a href="{{ route('grupos.index', ['genero_musical' => 'cumbia']) }}">Cumbia</a>
                    <a href="{{ route('grupos.index', ['genero_musical' => 'rock']) }}">Rock</a>
                </div>
            </div>
            <!-- Formularios para añadir grupos y canciones -->
            <div class="dropdown">
                <a href="#">Añadir</a>
                <div class="dropdown-content">
                    <!-- Enlace al formulario para crear un grupo -->
                    <a href="{{ route('grupos.create') }}">Grupos</a>
    
                    <!-- Enlace al formulario para crear una canción -->
                    <a href="{{ route('canciones.create') }}">Canciones</a>
                    <a href="{{ route('videos.add') }}">Agregar Video</a>
                
                </div>
            </div>
    
        </nav>
    </header>
    <div class="video-section">
        <h2>Introduce los links de los videos de YouTube</h2>
        <input type="text" id="video1" placeholder="Enlace del primer video">
        <br>
        <input type="text" id="video2" placeholder="Enlace del segundo video">
        <br>
        <button onclick="guardarVideos()">Guardar</button>
    </div>

    <script>
        function guardarVideos() {
            var video1 = document.getElementById('video1').value;
            var video2 = document.getElementById('video2').value;
            localStorage.setItem('video1', video1);
            localStorage.setItem('video2', video2);
            alert('Videos guardados correctamente');
        }
    </script>
</body>

</html>
