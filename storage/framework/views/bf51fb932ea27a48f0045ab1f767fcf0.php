<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Beca</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            animation: slideIn 0.7s ease-out;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
            font-size: 0.9rem;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus, input[type="date"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
            outline: none;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        button, .btn-regresar {
            width: 48%;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-regresar {
            background-color: #6c757d;
            color: white;
        }

        .btn-regresar:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        /* Animación suave de entrada */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Estilos para pantallas pequeñas */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            button, .btn-regresar {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Beca</h1>
        <form action="<?php echo e(route('becas.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <label for="codigo_especial">Código Especial:</label>
            <input type="text" name="codigo_especial" required>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            
            <label for="requisito">Requisito:</label>
            <input type="text" name="requisito" required>
            
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required>

            <!-- Contenedor para los botones -->
            <div class="button-container">
                <button type="submit">Guardar</button>
                <a href="<?php echo e(route('becas.index')); ?>" class="btn-regresar">Regresar</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/becas/create.blade.php ENDPATH**/ ?>