<!-- resources/views/videos/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Video</title>
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
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Añadir Nuevo Video</h2>
        <form action="{{ route('videos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título del Video 1:</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Ingresa el título del video">
            </div>
            <div class="form-group">
                <label for="link_video">Enlace del Video (YouTube):</label>
                <input type="text" id="link_video" name="link_video" required placeholder="https://www.youtube.com/watch?v=...">
            </div>
            <div class="form-group">
                <label for="titulo">Título del Video 2:</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Ingresa el título del video">
            </div>
            <div class="form-group">
                <label for="link_video">Enlace del Video (YouTube):</label>
                <input type="text" id="link_video" name="link_video" required placeholder="https://www.youtube.com/watch?v=...">
            </div>
            <button type="submit">Guardar Video</button>
        </form>
    </div>
</body>
</html>
