<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Canciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #00bfff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00bfff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #007acc;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .edit-btn {
            background-color: orange;
        }

        .delete-btn {
            background-color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Lista de Canciones</h2>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Grupo</th>
                    <th>Vistas</th>
                    <th>Likes</th>
                    <th>Ritmo</th>
                    <th>Video</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($canciones as $cancion)
                <tr>
                    <td>{{ $cancion->titulo }}</td>
                    <td>{{ $cancion->grupo->nombre }}</td>
                    <td>{{ $cancion->vistas }}</td>
                    <td>{{ $cancion->likes }}</td>
                    <td>{{ $cancion->ritmo }}</td>
                    <td>{{ $cancion->video ? 'Sí' : 'No' }}</td>
                    <td class="actions">
                        <a href="{{ route('canciones.edit', $cancion->id) }}" class="button edit-btn">Editar</a>
                        <form action="{{ route('canciones.destroy', $cancion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta canción?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button delete-btn">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('canciones.create') }}" class="button">Añadir Nueva Canción</a>
    </div>

</body>

</html>
