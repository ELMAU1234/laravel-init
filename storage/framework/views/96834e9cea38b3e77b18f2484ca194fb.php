

<?php $__env->startSection('title', 'Lista de Asignaciones'); ?>

<!-- Navbar -->
<div class="navbar">
    <div class="navbar-brand">Mi Proyecto</div>
    <div class="navbar-links">
        <a href="<?php echo e(route('estudiantes.index')); ?>">Estudiantes</a>
        <a href="<?php echo e(route('becas.index')); ?>">Becas</a>
        <a href="<?php echo e(route('asignaciones.index')); ?>">Asignaciones</a>
    </div>
</div>

<?php $__env->startSection('content'); ?>
    <style>
        /* Reset de padding y margin para una estructura más limpia */
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Estilos del Navbar */
        .navbar {
            background-color: #28a745; /* Verde */
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #f8f9fa; /* Blanco */
        }

        .navbar-links {
            display: flex;
        }

        .navbar-links a {
            color: #f8f9fa; /* Blanco claro */
            text-decoration: none;
            margin-right: 20px;
            font-size: 18px;
            font-weight: 500;
        }

        .navbar-links a:hover {
            color: #d1e7dd; /* Verde claro */
            text-decoration: underline;
        }

        /* Otros estilos de la página */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            padding-top: 80px; /* Ajuste para dejar espacio al navbar */
        }

        h1 {
            color: #17a2b8; /* Azul verdoso */
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ffc107; /* Amarillo */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a, .actions button {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .actions a {
            background-color: #6c757d; /* Gris */
            color: white;
        }

        .actions a:hover {
            background-color: #5a6268; /* Gris oscuro */
        }

        .actions button {
            background-color: #e83e8c; /* Rosa */
            color: white;
            border: none;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #d81b60; /* Rosa oscuro */
        }
    </style>

    <h1>Lista de Asignaciones de Becas</h1>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Beca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($asignacion->estudiante->nombre); ?> <?php echo e($asignacion->estudiante->apellido); ?></td>
                    <td><?php echo e($asignacion->beca->nombre); ?></td>
                    <td class="actions">
                        <a href="<?php echo e(route('asignaciones.edit', $asignacion->id)); ?>">Editar</a>

                        <!-- Formulario de eliminación con confirmación -->
                        <form action="<?php echo e(route('asignaciones.destroy', $asignacion->id)); ?>" method="POST" onsubmit="return confirmDelete();">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <a href="<?php echo e(route('asignaciones.create')); ?>" class="btn btn-primary">Asignar nueva beca</a>

    <script>
        // Función de confirmación antes de eliminar
        function confirmDelete() {
            return confirm('¿Estás seguro de que deseas eliminar esta asignación? Esta acción no se puede deshacer.');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('asignaciones.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/asignaciones/index.blade.php ENDPATH**/ ?>