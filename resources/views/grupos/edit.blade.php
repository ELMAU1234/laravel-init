<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo</title>
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
        <h2>Editar Grupo</h2>

        <!-- Formulario para actualizar grupo -->
        <form action="{{ route('grupos.update', $grupo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre del Grupo<span>*</span>:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Nombre del grupo" value="{{ $grupo->nombre }}" onkeyup="buscarGrupos()">
                <div id="listaGrupos"></div>
            </div>
        
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion">{{ $grupo->descripcion }}</textarea>
            </div>
        
            <!-- ... resto de los campos ... -->
        
            <div class="form-group">
                <label for="genero_musical">Género Musical<span>*</span>:</label>
                <input type="text" id="genero_musical" name="genero_musical" required placeholder="Escribe el género musical" value="{{ $grupo->genero_musical }}" onkeyup="buscarGeneros()">
                <div id="listaGeneros" style="position: absolute; background-color: white; border: 1px solid #ddd; width: 100%; z-index: 1000;"></div>
            </div>
        
            <button type="submit">Actualizar Grupo</button>
        </form>
        
        <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color: red;">Eliminar Grupo</button>
        </form>

        
    </div>

</body>

</html>
