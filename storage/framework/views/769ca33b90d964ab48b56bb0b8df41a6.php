<!-- resources/views/estudiantes/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Estudiante</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            animation: fadeIn 1s ease-in-out;
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            animation: slideDown 1s ease-in-out;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button, .btn-regresar {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            display: inline-block;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            width: 48%; /* Para que ambos botones ocupen el mismo espacio */
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-regresar {
            background-color: #6c757d;
            color: white;
            width: 48%; /* Para que ambos botones ocupen el mismo espacio */
        }

        .btn-regresar:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

    </style>
</head>
<body>
    <form action="<?php echo e(route('estudiantes.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <h1>Crear Estudiante</h1>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        
        <label for="dni">DNI:</label>
        <input type="text" name="dni" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>
        
        <label for="codigo_especial">Código Especial:</label>
        <input type="text" name="codigo_especial" required>
        
        <!-- Contenedor para los botones "Guardar" y "Regresar" -->
        <div class="btn-container">
            <button type="submit">Guardar</button>
            <a href="<?php echo e(route('estudiantes.index')); ?>" class="btn-regresar">Regresar</a>
        </div>
    </form>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/estudiantes/create.blade.php ENDPATH**/ ?>