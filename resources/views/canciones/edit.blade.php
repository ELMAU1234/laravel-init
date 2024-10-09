<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Canción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #00bfff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007acc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group span {
            color: red;
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
    <div class="container">
        <h2>Editar Canción</h2>

        <!-- Formulario para editar una canción -->
        <form action="{{ route('canciones.update', $cancion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título de la Canción<span>*</span>:</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $cancion->titulo) }}" required placeholder="Título de la canción">
            </div>

            <div class="form-group">
                <label for="grupo_id">Grupo:</label>
                <select id="grupo_id" name="grupo_id">
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ $grupo->id == $cancion->grupo_id ? 'selected' : '' }}>
                            {{ $grupo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_publicacion">Fecha de Publicación:</label>
                <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion', $cancion->fecha_publicacion) }}">
            </div>

            <div class="form-group">
                <label for="vistas">Cantidad de Vistas:</label>
                <input type="number" id="vistas" name="vistas" value="{{ old('vistas', $cancion->vistas) }}" placeholder="Cantidad de vistas">
            </div>

            <div class="form-group">
                <label for="likes">Cantidad de Likes:</label>
                <input type="number" id="likes" name="likes" value="{{ old('likes', $cancion->likes) }}" placeholder="Cantidad de likes">
            </div>

            <div class="form-group">
                <label for="ritmo">Ritmo:</label>
                <input type="text" id="ritmo" name="ritmo" value="{{ old('ritmo', $cancion->ritmo) }}" placeholder="Ritmo de la canción">
            </div>

            <div class="form-group">
                <label for="video">¿Tiene video?</label>
                <select id="video" name="video">
                    <option value="1" {{ $cancion->video ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$cancion->video ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="link_video">Link del Video:</label>
                <input type="text" id="link_video" name="link_video" value="{{ old('link_video', $cancion->link_video) }}" placeholder="Link del video">
            </div>

            <button type="submit">Actualizar Canción</button>
        </form>
    </div>

</body>

</html>