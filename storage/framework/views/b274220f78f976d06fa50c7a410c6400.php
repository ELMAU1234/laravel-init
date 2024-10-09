<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de <?php echo e($grupo->nombre); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

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
    <?php echo csrf_field(); ?>
<input type="text" name="titulo" required>
<?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1 class="display-4">Estadísticas de <?php echo e($grupo->nombre); ?></h1>
        </header>
        
        <div class="card mb-4">
            <div class="card-body">
                <h2>Género Musical:</h2>
                <p><?php echo e($grupo->genero_musical); ?></p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2>Canciones</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Título</th>
                            <th>Fecha de Publicación</th>
                            <th>Vistas</th>
                            <th>Likes</th>
                            <th>Ritmo</th>
                            <th>Video</th>
                            <th>Representación % Vistas</th>
                            <th>Representación % Likes</th>
                        </tr>
                    </thead>
                    <?php
                    $totalVistas = $grupo->canciones->sum('vistas');
                    $totalLikes = $grupo->canciones->sum('likes');
                ?>
                    <tbody>
                        <?php $__currentLoopData = $grupo->canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cancion->id); ?></td>
                            <td><?php echo e($cancion->titulo); ?></td>
                            <td><?php echo e($cancion->fecha_publicacion); ?></td>
                            <td><?php echo e($cancion->vistas); ?></td>
                            <td><?php echo e($cancion->likes); ?></td>
                            <td><?php echo e($cancion->ritmo); ?></td>
                            <td><a href="<?php echo e($cancion->video_link); ?>" target="_blank">Ver Video</a></td>
                            <td>
                                <?php if($totalVistas > 0): ?>
                                    <?php echo e(round(($cancion->vistas / $totalVistas) * 100, 5)); ?> %
                                <?php else: ?>
                                    0 %
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($totalLikes > 0): ?>
                                    <?php echo e(round(($cancion->likes / $totalLikes) * 100, 5)); ?> %
                                <?php else: ?>
                                    0 %
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    
                    
                </table>
            </div>
        </div>


     
        <div>
            <h2 class="text-center">Gráfico de Vistas por Canción</h2>
            <canvas id="myChartVistas"></canvas>
        </div>
        
        <div>
            <h2 class="text-center">Gráfico de Likes por Canción</h2>
            <canvas id="myChartLikes"></canvas>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctxVistas = document.getElementById('myChartVistas').getContext('2d');
                const ctxLikes = document.getElementById('myChartLikes').getContext('2d');

                new Chart(ctxVistas, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($grupo->canciones->pluck('titulo')); ?>,
                        datasets: [{
                            label: 'Cantidad de Vistas',
                            data: <?php echo json_encode($grupo->canciones->pluck('vistas')); ?>,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Número de Vistas'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Canciones'
                                }
                            }
                        }
                    }
                });

                new Chart(ctxLikes, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($grupo->canciones->pluck('titulo')); ?>,
                        datasets: [{
                            label: 'Cantidad de Likes',
                            data: <?php echo json_encode($grupo->canciones->pluck('likes')); ?>,
                            backgroundColor: 'rgba(255, 206, 86, 0.6)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Número de Likes'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Canciones'
                                }
                            }
                        }
                    }
                });
            });
        </script>
     
            
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h2>Tabla Matriz de Ritmos</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ritmo</th>
                        <th>Cantidad</th>
                        <th>Representación % Cantidad</th>
                        <th>Vistas</th>
                        <th>Representación % Vistas</th>
                        <th>Likes</th>
                        <th>Representación % Likes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $matrizData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($data['ritmo']); ?></td>
                        <td><?php echo e($data['cantidad']); ?></td>
                        <td><?php echo e(number_format($data['representacion_porcentaje_cantidad'], 3)); ?>%</td>
                        <td><?php echo e($data['vistas']); ?></td>
                        <td><?php echo e(number_format($data['representacion_porcentaje_vistas'], 4)); ?>%</td>
                        <td><?php echo e($data['likes']); ?></td>
                        <td><?php echo e(number_format($data['representacion_porcentaje_likes'], 4)); ?>%</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

        
    </script>

        <!-- Gráfico de la cantidad de videos por ritmo -->
        <div class="container mt-4">
            <h2 class="text-center">Cantidad de Videos por Ritmo</h2>
            <canvas id="videosPorRitmo"></canvas>
        </div>

        <script>
            const ctxRitmo = document.getElementById('videosPorRitmo');
        
            new Chart(ctxRitmo, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($ritmos_labels); ?>,  // Convertir PHP a JavaScript
                    datasets: [{
                        label: 'Cantidad de Videos',
                        data: <?php echo json_encode($ritmos_data); ?>, // Convertir PHP a JavaScript
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Gráfico de las vistas acumuladas por ritmo -->
<div class="container mt-4">
    <h2 class="text-center">Vistas Acumuladas por Ritmo</h2>
    <canvas id="vistasAcumuladasPorRitmo"></canvas>
</div>

<script>
    // Obtener el contexto del canvas
    const ctxVistas = document.getElementById('vistasAcumuladasPorRitmo');

    // Inicializar el gráfico con Chart.js
    new Chart(ctxVistas, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: <?php echo json_encode($ritmos_labels); ?>,  // Convertir PHP a JavaScript
            datasets: [{
                label: 'Vistas Acumuladas', // Etiqueta del conjunto de datos
                data: <?php echo json_encode($ritmos_vistas_data); ?>, // Datos del gráfico
                backgroundColor: 'rgba(153, 102, 255, 0.2)', // Color de fondo de las barras
                borderColor: 'rgba(153, 102, 255, 1)', // Color del borde de las barras
                borderWidth: 1 // Grosor del borde
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Comenzar el eje Y en cero
                }
            },

        }
    });
</script>
<!-- Gráfico de los likes acumulados por ritmo -->
<div class="container mt-4">
    <h2 class="text-center">Likes Acumulados por Ritmo</h2>
    <canvas id="likesAcumuladosPorRitmo"></canvas>
</div>

<script>
    // Obtener el contexto del canvas
    const ctxLikes = document.getElementById('likesAcumuladosPorRitmo');

    // Inicializar el gráfico con Chart.js
    new Chart(ctxLikes, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: <?php echo json_encode($ritmos_labels); ?>,  // Convertir PHP a JavaScript
            datasets: [{
                label: 'Likes Acumulados', // Etiqueta del conjunto de datos
                data: <?php echo json_encode($likes_acumulados_data); ?>, // Datos del gráfico
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo de las barras
                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                borderWidth: 1 // Grosor del borde
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Comenzar el eje Y en cero
                }
            },
        }
    });
</script>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/grupos/estadisticas.blade.php ENDPATH**/ ?>