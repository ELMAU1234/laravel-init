

<?php $__env->startSection('content'); ?>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        select, input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        select:focus, input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>

    <h1><?php echo e(isset($asignacion) ? 'Editar Asignación' : 'Asignar Beca a Estudiante'); ?></h1>
    
    <form action="<?php echo e(isset($asignacion) ? route('asignaciones.update', $asignacion->id) : route('asignaciones.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($asignacion)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <label for="estudiante_id">Estudiante:</label>
        <select name="estudiante_id" required>
            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estudiante->id); ?>" 
                    <?php echo e(isset($asignacion) && $asignacion->estudiante_id == $estudiante->id ? 'selected' : ''); ?>>
                    <?php echo e($estudiante->nombre); ?> <?php echo e($estudiante->apellido); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="beca_id">Beca:</label>
        <select name="beca_id" required>
            <?php $__currentLoopData = $becas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($beca->id); ?>" 
                    <?php echo e(isset($asignacion) && $asignacion->beca_id == $beca->id ? 'selected' : ''); ?>>
                    <?php echo e($beca->nombre); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <button type="submit"><?php echo e(isset($asignacion) ? 'Actualizar Asignación' : 'Asignar Beca'); ?></button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('asignaciones.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proy30\becas_app\resources\views/asignaciones/edit.blade.php ENDPATH**/ ?>