<!-- resources/views/estudiantes/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Editar Estudiante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            animation: fadeInForm 1s ease-in-out;
        }

        h1 {
            text-align: center;
            color: #333;
            animation: fadeInText 1s ease-in-out;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="file"]:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        /* Animaciones */
        @keyframes fadeInForm {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInText {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form action="<?php echo e(route('estudiantes.update', $estudiante->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="codigo_especial">Código Especial:</label>
        <input type="text" name="codigo_especial" value="<?php echo e(old('codigo_especial', $estudiante->codigo_especial)); ?>" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo e(old('nombre', $estudiante->nombre)); ?>" required>
        
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo e(old('apellido', $estudiante->apellido)); ?>" required>
        
        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="<?php echo e(old('dni', $estudiante->dni)); ?>" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo e(old('direccion', $estudiante->direccion)); ?>">

        <button type="submit">Actualizar</button>
    </form>
    <a href="<?php echo e(route('estudiantes.store')); ?>" class="btn-regresar">Regresar</a>

<style>
    .btn-regresar {
        display: inline-block;
        padding: 10px 20px;
        background-color: #00d9ff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-regresar:hover {
        background-color: #b3aa00;
        transform: scale(1.05);
    }

    .btn-regresar:active {
        transform: scale(0.95);
        background-color: #487f00;
    }
</style>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/estudiantes/edit.blade.php ENDPATH**/ ?>