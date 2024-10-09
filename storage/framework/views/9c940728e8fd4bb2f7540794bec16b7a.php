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

        <!-- Tabla para mostrar las canciones -->
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
                <?php $__currentLoopData = $canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cancion->titulo); ?></td>
                    <td><?php echo e($cancion->grupo->nombre); ?></td>
                    <td><?php echo e($cancion->vistas); ?></td>
                    <td><?php echo e($cancion->likes); ?></td>
                    <td><?php echo e($cancion->ritmo); ?></td>
                    <td><?php echo e($cancion->video ? 'Sí' : 'No'); ?></td>
                    <td class="actions">
                        <!-- Enlace para editar la canción -->
                        <a href="<?php echo e(route('canciones.edit', $cancion->id)); ?>" class="button edit-btn">Editar</a>

                        <!-- Formulario para eliminar la canción -->
                        <form action="<?php echo e(route('canciones.destroy', $cancion->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta canción?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="button delete-btn">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Enlace para añadir una nueva canción -->
        <a href="<?php echo e(route('canciones.create')); ?>" class="button">Añadir Nueva Canción</a>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/canciones/index.blade.php ENDPATH**/ ?>