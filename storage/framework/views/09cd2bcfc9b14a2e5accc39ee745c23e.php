<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f9;
            padding: 0;
            margin: 0;
        }

        /* Estilos del Navbar */
        .navbar {
            background-color: #520a4d;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .navbar a:hover {
            color: #adb5bd;
        }

        .navbar-brand {
            font-size: 22px;
            font-weight: 700;
            color: #f8f9fa;
        }

        h1 {
            text-align: center;
            color: #212529;
            font-weight: 600;
            margin-top: 20px;
        }

        .table-container {
            margin: 20px auto;
            width: 85%;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ced4da;
        }

        th, td {
            padding: 14px;
            text-align: left;
        }

        th {
            background-color: #6a0668;
            color: #f8f9fa;
        }

        tr:nth-child(even) {
            background-color: #f1f3f5;
        }

        tr:hover {
            background-color: #dee2e6;
            transition: background-color 0.3s;
        }

        .actions {
            display: flex;
            gap: 12px;
        }

        /* Botones de acción */
        .btn, button {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .btn-add {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-add:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-brand">Mi Proyecto</div>
        <div>
            <a href="<?php echo e(route('estudiantes.index')); ?>">Estudiantes</a>
            <a href="<?php echo e(route('becas.index')); ?>">Becas</a>
            <a href="<?php echo e(route('asignaciones.index')); ?>">Asignaciones</a>
        </div>
    </div>

    <h1>Lista de Estudiantes</h1>

    <a href="<?php echo e(route('estudiantes.create')); ?>" class="btn btn-add">Agregar Estudiante</a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($estudiante->id); ?></td>
                        <td><?php echo e($estudiante->nombre); ?></td>
                        <td><?php echo e($estudiante->apellido); ?></td>
                        <td><?php echo e($estudiante->dni); ?></td>
                        <td><?php echo e($estudiante->direccion); ?></td>
                        <td>
                            <div class="actions">
                                <a href="<?php echo e(route('estudiantes.edit', $estudiante->id)); ?>" class="btn btn-primary">Editar</a>
                                
                                <!-- Botón de eliminar con confirmación -->
                                <form action="<?php echo e(route('estudiantes.destroy', $estudiante->id)); ?>" method="POST" onsubmit="return confirmDelete()">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar este estudiante? Esta acción no se puede deshacer.');
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/estudiantes/index.blade.php ENDPATH**/ ?>