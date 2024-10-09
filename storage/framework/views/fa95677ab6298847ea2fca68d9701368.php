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
            position: relative;
        }

        /* Estilos para el logo responsivo */
        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 100%;
            max-width: 350px;
            height: auto;
        }

        /* Menú de navegación */
        nav {
            margin-top: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin: 0 10px;
        }

        nav a {
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

        /* Estilos del menú "hamburger" solo en pantallas pequeñas */
        .menu-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2;
        }

        @media (max-width: 768px) {

            /* Mostrar el ícono "hamburger" en pantallas pequeñas */
            .menu-toggle {
                display: block;
            }

            nav {
                display: none;
                position: absolute;
                top: 70px;
                right: 0;
                background-color: white;
                width: 100%;
                height: 100vh;
                text-align: center;
                z-index: 10;
            }

            nav ul {
                display: block;
                margin-top: 20px;
            }

            nav ul li {
                display: block;
                margin: 20px 0;
            }

            /* Mostrar el menú cuando se active el "hamburger" */
            nav.active {
                display: block;
            }
        }

        /* Específicamente para móviles de hasta 450px de ancho */
        @media (max-width: 450px) {
            .logo img {
                max-width: 300px;
            }

            .banner img {
                max-height: 200px;
            }

            nav ul li {
                margin: 10px 0;
            }
        }

        /* Específicamente para tabletas de 700px a 768px de ancho */
        @media (min-width: 700px) and (max-width: 768px) {
            .logo img {
                max-width: 330px;
            }

            .banner img {
                max-height: 350px;
            }

            nav ul li {
                margin: 15px 0;
            }
        }

        /* Banner responsivo */
        .banner {
            width: 100%;
            max-height: 450px;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
        <!-- Icono de menú "hamburger" -->
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>

        <!-- Logo -->
        <div class="logo">
            <img src="<?php echo e(asset('imagenes/logo.jpg')); ?>" alt="Logo Music a un Click">
        </div>

        <!-- Menú de navegación -->
        <nav id="navbar">
            <ul>
                <li><a href="<?php echo e(route('welcome')); ?>">Inicio</a></li>
                <li>
                    <div class="dropdown">
                        <a href="<?php echo e(route('grupos.index')); ?>">Buscar Categoría Musical</a>
                        <div class="dropdown-content">
                            <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'folklore boliviano'])); ?>">Folklore
                                Boliviano</a>
                            <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'musica cristiana'])); ?>">Música
                                Cristiana</a>
                            <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'cumbia'])); ?>">Cumbia</a>
                            <a href="<?php echo e(route('grupos.index', ['genero_musical' => 'rock'])); ?>">Rock</a>
                        </div>
                    </div>
                </li>
                <li><a href="https://wa.me/59169893702?text=Hola%2C%20quisiera%20solicitar%20asesoramiento"
                        target="_blank">Solicitar Asesoramiento</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner responsivo -->
    <div class="banner">
        <img src="<?php echo e(asset('imagenes/IM1.png')); ?>" alt="Banner Imagen">
    </div>

    <script>
        // Función para mostrar/ocultar el menú en pantallas pequeñas
        function toggleMenu() {
            var navbar = document.getElementById('navbar');
            navbar.classList.toggle('active');
        }
    </script>



</body>

</html>
<?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/welcome.blade.php ENDPATH**/ ?>