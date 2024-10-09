<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Beca a Estudiante</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(135deg, #e0e0e0 25%, #f4f4f9 100%);
        }

        .form-container {
            max-width: 500px;
            width: 100%;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 1.8em;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus, input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Botones */
        .btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            margin-bottom: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-green {
            background-color: #28a745;
            color: white;
        }

        .btn-green:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-blue {
            background-color: #007bff;
            color: white;
        }

        .btn-blue:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-red {
            background-color: #dc3545;
            color: white;
        }

        .btn-red:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        /* Animación */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h1>Asignar Beca a Estudiante</h1>
        <form action="<?php echo e(route('asignaciones.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <label for="estudiante_id">Estudiante:</label>
            <select name="estudiante_id" required>
                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($estudiante->id); ?>"><?php echo e($estudiante->nombre); ?> <?php echo e($estudiante->apellido); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label for="beca_id">Beca:</label>
            <select name="beca_id" required>
                <?php $__currentLoopData = $becas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($beca->id); ?>"><?php echo e($beca->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <!-- Botón principal -->
            <button type="submit" class="btn btn-blue">Asignar Beca</button>

            
            <button type="button" class="btn btn-red" onclick="window.location.href='<?php echo e(route('asignaciones.index')); ?>'">Cancelar</button>

        </form>
    </div>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/asignaciones/create.blade.php ENDPATH**/ ?>