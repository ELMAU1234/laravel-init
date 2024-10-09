<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Asignaciones de Becas</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        nav {
            margin-top: 20px;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: #ffffff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        main {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        main h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        /* Estilos para botones adicionales */
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        /* Animación de fade-in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2em;
            }

            nav a {
                padding: 8px 15px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            nav {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            nav a {
                margin-bottom: 10px;
                width: 100%;
                text-align: center;
            }

            main {
                padding: 20px;
            }
        }

        /* Footer opcional */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: white;
            margin-top: 20px;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!--<header>
            <h1>Gestión de Asignaciones de Becas</h1>
            <nav>
                <a href="{//{ route('asignaciones.index') }}">Inicio</a>
                <a href="{//{ route('asignaciones.create') }}">Asignar Beca</a>
            </nav>
        </header>-->
        
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/asignaciones/app.blade.php ENDPATH**/ ?>