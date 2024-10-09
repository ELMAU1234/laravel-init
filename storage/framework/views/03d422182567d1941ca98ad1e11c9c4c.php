<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Becas</title>
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f9;
            padding: 0;
            margin: 0;
        }

        /* Estilos del Navbar */
        .navbar {
            background-color: #28a745; /* Verde */
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
            color: #d1e7dd; /* Verde claro */
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: white;
        }

        h1 {
            color: #17a2b8; /* Azul verdoso */
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .add-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
            background-color: #ffc107; /* Amarillo */
            border-radius: 5px;
        }

        .add-link:hover {
            background-color: #e0a800; /* Amarillo oscuro */
        }

        .table-container {
            margin: 20px auto;
            width: 80%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeInTable 1s ease-in-out;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #28a745; /* Verde */
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        button {
            background-color: #e83e8c; /* Rosa */
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d81b60; /* Rosa oscuro */
        }

        .actions a {
            color: #17a2b8; /* Azul verdoso */
            text-decoration: none;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .actions a:hover {
            color: #138496; /* Azul oscuro */
            text-decoration: underline;
        }

        form {
            display: inline-block;
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

    <h1>Lista de Becas</h1>
    
    <a href="<?php echo e(route('becas.create')); ?>" class="add-link">Agregar Beca</a>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Requisito</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $becas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($beca->id); ?></td>
                    <td><?php echo e($beca->nombre); ?></td>
                    <td><?php echo e($beca->requisito); ?></td>
                    <td><?php echo e($beca->fecha); ?></td>
                    <td class="actions">
                        <!-- Botón "Editar" -->
                        <a href="<?php echo e(route('becas.edit', $beca->id)); ?>" class="btn-edit">Editar</a>
        
                        <!-- Botón "Eliminar" -->
                        <form action="<?php echo e(route('becas.destroy', $beca->id)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
    </table>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/becas/index.blade.php ENDPATH**/ ?>