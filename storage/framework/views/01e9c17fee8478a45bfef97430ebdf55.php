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


        header {
            background-color: white;
            padding: 20px;
            text-align: center;
        }
        .logo {
            color: navy;
            font-size: 24px;
            font-weight: bold;
        }
        .logo span {
            color: #00bfff;
        }
        nav {
            margin-top: 20px;
        }
        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
        }
        .dropdown {
            display: inline-block;
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 160px;
            z-index: 1;
        }
        .dropdown-content a {
            display: block;
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #f0f0f0;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover a {
            color: #00bfff;
        }
        .search-bar {
            margin: 20px auto;
            width: 300px;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
        }
        .artist {
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            display: flex;
        }
        .artist img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }
        .artist-info {
            flex-grow: 1;
        }
        .artist-info p {
            text-align: justify;
        }
        .social-icons-buttons {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        .social-icons {
            display: flex;
            gap: 10px;
        }
        .social-icons img {
            width: 30px;
            height: 30px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .buttons button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .buttons button:hover {
            background-color: #00bfff;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?php echo e(asset('imagenes/logo.jpg')); ?>" alt="Logo Music a un Click" style="width: 350px; height: auto;">
        </div>
        <nav>
            <a href="<?php echo e(route('welcome')); ?>">Inicio</a>
            <div class="dropdown">
                <a href="<?php echo e(route('grupos.index')); ?>">Buscar Categoría Musical</a>
                <div class="dropdown-content">
                    <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'folcklore boliviano'])); ?>">Folklore
                        Boliviano</a>
                    <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'musica cristiana'])); ?>">Música Cristiana</a>
                    <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'cumbia'])); ?>">Cumbia</a>
                    <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'rock'])); ?>">Rock</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#">Añadir</a>
                <div class="dropdown-content">
                    <a href="<?php echo e(route('grupos.create')); ?>">Grupos</a>
                    <a href="<?php echo e(route('canciones.create')); ?>">Canciones</a>
                    <a href="<?php echo e(route('videos.add')); ?>">Agregar Video</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h2>Añadir Nueva Canción</h2>
        <form action="<?php echo e(route('canciones.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="titulo">Título de la Canción<span>*</span>:</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Escribe el título de la canción">
            </div>
            <div class="form-group">
                <label for="grupo_id">Grupo:</label>
                <select id="grupo_id" name="grupo_id">
                    <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($grupo->id); ?>"><?php echo e($grupo->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ritmo">Ritmo:</label>
                <input type="text" id="ritmo" name="ritmo" placeholder="Especifica el ritmo">
            </div>
            <div class="form-group">
                <label for="video">¿Tiene video?</label>
                <select id="video" name="video">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="link_video">Link del Video:</label>
                <input type="text" id="link_video" name="link_video" placeholder="URL del video">
            </div>
            <button type="submit">Guardar Canción</button>
            
        </form>
    </div>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\proy30\music\resources\views/canciones/create.blade.php ENDPATH**/ ?>