<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Canción</title>
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
        input[type="number"],
        input[type="date"],
        select,
        textarea {
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
        <h2>Añadir Nueva Canción</h2>

        <form action="<?php echo e(route('canciones.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Título de la canción -->
            <div class="form-group">
                <label for="titulo">Título de la Canción<span>*</span>:</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Escribe el título de la canción">
            </div>

            <!-- Grupo asociado -->
            <div class="form-group">
                <label for="grupo_id">Grupo:</label>
                <select id="grupo_id" name="grupo_id">
                    <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($grupo->id); ?>"><?php echo e($grupo->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Fecha de publicación con calendario -->
            <div class="form-group">
                <label for="fecha_publicacion">Fecha de Publicación:</label>
                <input type="date" id="fecha_publicacion" name="fecha_publicacion">
            </div>

            <!-- Vistas del video -->
            <div class="form-group">
                <label for="vistas">Cantidad de Vistas:</label>
                <input type="number" id="vistas" name="vistas" placeholder="Cantidad de vistas">
            </div>

            <!-- Likes del video -->
            <div class="form-group">
                <label for="likes">Cantidad de Likes:</label>
                <input type="number" id="likes" name="likes" placeholder="Cantidad de likes">
            </div>

            <!-- Ritmo de la canción -->
            <div class="form-group">
                <label for="ritmo">Ritmo:</label>
                <input type="text" id="ritmo" name="ritmo" placeholder="Especifica el ritmo">
            </div>

            <!-- Tiene video (Sí/No) -->
            <div class="form-group">
                <label for="video">¿Tiene video?</label>
                <select id="video" name="video">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>

            <!-- Link del video (opcional) -->
            <div class="form-group">
                <label for="link_video">Link del Video:</label>
                <input type="text" id="link_video" name="link_video" placeholder="URL del video">
            </div>

            <!-- Botón para guardar la canción -->
            <button type="submit">Guardar Canción</button>
            
        </form>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/canciones/create.blade.php ENDPATH**/ ?>