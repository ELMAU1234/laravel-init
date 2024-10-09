<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUSIC-a un CLICK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        /* Estilo para la barra de búsqueda */
        .search-bar {
            margin: 30px auto;
            width: 100%;
            max-width: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar form {
            display: flex;
            width: 100%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            overflow: hidden;
        }

        .search-bar input[type="text"] {
            width: 80%;
            padding: 15px 20px;
            border: none;
            outline: none;
            font-size: 16px;
            border-radius: 50px 0 0 50px;
            background-color: #f0f0f0;
            transition: background-color 0.3s ease;
        }

        .search-bar input[type="text"]:focus {
            background-color: #e0e0e0;
        }

        .search-bar button {
            width: 20%;
            background-color: #00bfff;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 0 50px 50px 0;
        }

        .search-bar button:hover {
            background-color: #007acc;
        }

        .search-bar button:focus {
            outline: none;
        }

        /* Estilo para el artista */
        .artist {
            background-color: white;
            margin: 20px auto;
            padding: 30px;
            max-width: 800px;
            display: flex;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .artist img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 20px;
        }

        .artist-info {
            flex-grow: 1;
        }

        .artist-info h2 {
            margin: 0 0 10px;
            font-size: 24px;
            color: #333;
        }

        .artist-info p {
            text-align: justify;
            color: #555;
        }

        /* Redes sociales y botones */
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

        .social-icons a {
            text-decoration: none;
        }

        .social-icons img {
            width: 30px;
            height: 30px;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .buttons a {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #00bfff;
        }

        /* Diseño responsivo para pantallas menores a 768px (tablets y móviles) */
        @media screen and (max-width: 768px) {

            /* Ajusta el encabezado */
            header {
                padding: 15px;
                text-align: left;
            }

            .logo img {
                max-width: 250px;
                /* Ajusta el tamaño del logo */
            }

            nav {
                margin-top: 10px;
            }

            nav a {
                font-size: 14px;
                /* Reduce el tamaño del texto de navegación */
                margin: 0 5px;
            }

            /* Ajusta la barra de búsqueda */
            .search-bar {
                margin: 20px auto;
                max-width: 100%;
            }

            /* Ajusta el contenedor de cada artista */
            .artist {
                max-width: 100%;
                flex-direction: column;
                text-align: center;
            }

            .artist img {
                margin: 0 auto 20px;
                width: 100px;
                /* Reduce el tamaño de la imagen */
                height: 100px;
            }

            /* Alineación del contenido */
            .social-icons-buttons {
                flex-direction: column;
            }

            .buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Diseño responsivo para pantallas menores a 450px (móviles pequeños) */
        @media screen and (max-width: 450px) {
            header {
                padding: 10px;
            }

            .logo img {
                max-width: 200px;
                /* Ajusta aún más el tamaño del logo */
            }

            nav a {
                font-size: 12px;
                /* Reduce el tamaño del texto de navegación */
                margin: 0 3px;
            }

            /* Ajustes adicionales para dispositivos móviles pequeños */
            .artist img {
                width: 80px;
                height: 80px;
            }

            .artist-info h2 {
                font-size: 20px;
                /* Reduce el tamaño de los títulos */
            }

            .artist-info p {
                font-size: 14px;
                /* Reduce el tamaño del texto */
            }
        }
    </style>
</head>

<body>
    <header>
        <!-- Logo -->
        <div class="logo">
            <img src="<?php echo e(asset('imagenes/logo.jpg')); ?>" alt="Logo Music a un Click" style="width: 350px; height: auto;">
        </div>

        <!-- Navegación -->
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
            <!-- Formularios para añadir grupos y canciones -->
            <div class="dropdown">
                <a href="#">Añadir</a>
                <div class="dropdown-content">
                    <!-- Enlace al formulario para crear un grupo -->
                    <a href="<?php echo e(route('grupos.create')); ?>">Grupos</a>

                    <!-- Enlace al formulario para crear una canción -->
                    <a href="<?php echo e(route('canciones.create')); ?>">Canciones</a>

                
                </div>
            </div>

        </nav>
    </header>

    <!-- Buscador -->
    <div class="search-bar">
        <form action="<?php echo e(route('grupos.buscar')); ?>" method="GET">
            <input type="text" name="search" placeholder="Buscar grupo o descripción"
                value="<?php echo e(request()->get('search')); ?>">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <!-- Grupos -->
    <div>
        <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="artist">
                <img src="<?php echo e(asset($grupo->imagen)); ?>" alt="<?php echo e($grupo->nombre); ?>">
                <div class="artist-info">
                    <h2><?php echo e($grupo->nombre); ?></h2>
                    <p><?php echo e($grupo->descripcion); ?></p>
                    <p>Género: <?php echo e($grupo->genero_musical); ?></p>
                    <div class="social-icons-buttons">
                        <div class="social-icons">
                            
                            <?php if($grupo->url_facebook): ?>
                                <a href="<?php echo e($grupo->url_facebook); ?>" target="_blank">
                                    <img src="/imagenes/facebook.png" alt="Facebook">
                                </a>
                            <?php else: ?>
                                <span title="El grupo no cuenta con esta red social">
                                    <img src="/imagenes/facebook.png" alt="Facebook no disponible"
                                        style="opacity: 0.5;">
                                </span>
                            <?php endif; ?>

                            
                            <?php if($grupo->url_tiktok): ?>
                                <a href="<?php echo e($grupo->url_tiktok); ?>" target="_blank">
                                    <img src="/imagenes/tik-tok.png" alt="TikTok">
                                </a>
                            <?php else: ?>
                                <span title="El grupo no cuenta con esta red social">
                                    <img src="/imagenes/tik-tok.png" alt="TikTok no disponible" style="opacity: 0.5;">
                                </span>
                            <?php endif; ?>

                            
                            <?php if($grupo->url_instagram): ?>
                                <a href="<?php echo e($grupo->url_instagram); ?>" target="_blank">
                                    <img src="/imagenes/instagram.png" alt="Instagram">
                                </a>
                            <?php else: ?>
                                <span title="El grupo no cuenta con esta red social">
                                    <img src="/imagenes/instagram.png" alt="Instagram no disponible"
                                        style="opacity: 0.5;">
                                </span>
                            <?php endif; ?>

                            
                            <?php if($grupo->url_youtube): ?>
                                <a href="<?php echo e($grupo->url_youtube); ?>" target="_blank">
                                    <img src="/imagenes/youtube.png" alt="YouTube">
                                </a>
                            <?php else: ?>
                                <span title="El grupo no cuenta con esta red social">
                                    <img src="/imagenes/youtube.png" alt="YouTube no disponible" style="opacity: 0.5;">
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="buttons">
                            <a href="<?php echo e(route('grupos.estadisticas', $grupo->id)); ?>">Ver estadísticas</a>
                            <a href="https://wa.me/<?php echo e($grupo->contacto_whatsapp); ?>" target="_blank">CONTACTAR</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/grupos/index.blade.php ENDPATH**/ ?>