<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de {{ $grupo->nombre }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

        .artist {
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            max-width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .artist img {
            width: 100%;
            max-width: 150px;
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .artist {
                flex-direction: column;
                align-items: center;
            }

            .artist img {
                margin-bottom: 20px;
            }

            .search-bar {
                width: 100%;
                padding: 0 15px;
            }

            .card {
                margin: 10px;
            }
        }

        /* Table overflow handling for small screens */
        @media (max-width: 576px) {
            .table-responsive {
                overflow-x: auto;
            }

            .table thead th {
                font-size: 12px;
            }

            .table tbody td {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    @csrf
<header>
    <div class="logo">
        <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo Music a un Click" style="width: 350px; height: auto;">
    </div>
    <nav>
        <a href="{{ route('welcome') }}">Inicio</a>
        <div class="dropdown">
            <a href="{{ route('grupos.index') }}">Buscar Categoría Musical</a>
            <div class="dropdown-content">
                <a href="{{ route('grupos.index', ['genero_musical' => 'folcklore boliviano']) }}">Folklore
                    Boliviano</a>
                <a href="{{ route('grupos.index', ['genero_musical' => 'musica cristiana']) }}">Música Cristiana</a>
                <a href="{{ route('grupos.index', ['genero_musical' => 'cumbia']) }}">Cumbia</a>
                <a href="{{ route('grupos.index', ['genero_musical' => 'rock']) }}">Rock</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">Añadir</a>
            <div class="dropdown-content">
                <a href="{{ route('grupos.create') }}">Grupos</a>
                <a href="{{ route('canciones.create') }}">Canciones</a>
                <a href="{{ route('videos.add') }}">Agregar Video</a>
            </div>
        </div>
    </nav>
</header>
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1 class="display-4">Estadísticas de {{ $grupo->nombre }}</h1>
        </header>
        <div class="card mb-4">
            <div class="card-body">
                <h2>Género Musical:</h2>
                <p>{{ $grupo->genero_musical }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Canciones</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive"> <!-- Agregado para responsividad -->
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
                        @php
                        $totalVistas = $grupo->canciones->sum('vistas');
                        $totalLikes = $grupo->canciones->sum('likes');
                        @endphp
                        <tbody>
                            @foreach($grupo->canciones as $cancion)
                            @php
                                $video_id = null;
                                if (preg_match('/v=([^&]+)/', $cancion->link_video, $matches)) {
                                    $video_id = $matches[1];
                                } elseif (preg_match('/youtu\.be\/([^?]+)/', $cancion->link_video, $matches)) {
                                    $video_id = $matches[1];
                                }
        
                                $youtubePublishedAt = 'N/A';
                                $youtubeViewCount = 'N/A';
                                $youtubeLikeCount = 'N/A';
                                if ($video_id) {
                                    $api_key = 'AIzaSyAQ_MTXLm6LwaKq486rKRJ4J_VdtHYbAHg'; // API
                                    $stats_url = 'https://www.googleapis.com/youtube/v3/videos?key='. $api_key .'&id='. $video_id .'&part=statistics,snippet';
                                    $video_stats = file_get_contents($stats_url);
                                    $video_stats_arr = json_decode($video_stats, true);
        
                                    if (!empty($video_stats_arr['items'][0])) {
                                        $statistics = $video_stats_arr['items'][0]['statistics'] ?? [];
                                        $snippet = $video_stats_arr['items'][0]['snippet'] ?? [];
        
                                        $youtubeViewCount = $statistics['viewCount'] ?? 'N/A';
                                        $youtubeLikeCount = $statistics['likeCount'] ?? 'N/A';
                                        $youtubePublishedAt = !empty($snippet['publishedAt']) ? date('Y-m-d', strtotime($snippet['publishedAt'])) : 'N/A'; // Formato de fecha
                                    }
                                }
                            @endphp
                            <tr>
                                <td>{{ $cancion->id }}</td>
                                <td>{{ $cancion->titulo }}</td>
                                <td>{{ $cancion->fecha_publicacion }}</td>
                                <td>{{ $cancion->vistas }}</td>
                                <td>{{ $cancion->likes }}</td>
                                <td>{{ $cancion->ritmo }}</td>
                                <td><a href="{{$cancion->link_video}}" target="_blank">Ver Video</a></td>
                                <td>
                                    @if($totalVistas > 0)
                                        {{ round(($cancion->vistas / $totalVistas) * 100, 5) }} %
                                    @else
                                        0 %
                                    @endif
                                </td>
                                <td>
                                    @if($totalLikes > 0)
                                        {{ round(($cancion->likes / $totalLikes) * 100, 5) }} %
                                    @else
                                        0 %
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- Cierre de table-responsive -->
        
                <form action="{{ route('canciones.guardarDatosYouTube') }}" method="POST" id="guardarDatosYoutubeForm">
                    @csrf
                    <input type="hidden" name="youtubePublishedAt" value="{{ $youtubePublishedAt }}">
                    <input type="hidden" name="youtubeViewCount" value="{{ $youtubeViewCount }}">
                    <input type="hidden" name="youtubeLikeCount" value="{{ $youtubeLikeCount }}">
                    <input type="hidden" name="cancion_id" value="{{ $cancion->id }}"> 
                    <button type="submit" class="btn btn-primary">Actualizar datos</button>
                </form>
        
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
                        labels: {!! json_encode($grupo->canciones->pluck('titulo')) !!},
                        datasets: [{
                            label: 'Cantidad de Vistas',
                            data: {!! json_encode($grupo->canciones->pluck('vistas')) !!},
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
                        labels: {!! json_encode($grupo->canciones->pluck('titulo')) !!},
                        datasets: [{
                            label: 'Cantidad de Likes',
                            data: {!! json_encode($grupo->canciones->pluck('likes')) !!},
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
            <h2>Resumen Estadístico de Ritmos Musicales</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive"> <!-- Agregado para responsividad -->
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
                        @foreach($matrizData as $data)
                        <tr>
                            <td>{{ $data['ritmo'] }}</td>
                            <td>{{ $data['cantidad'] }}</td>
                            <td>{{ number_format($data['representacion_porcentaje_cantidad'], 3) }}%</td>
                            <td>{{ $data['vistas'] }}</td>
                            <td>{{ number_format($data['representacion_porcentaje_vistas'], 4) }}%</td>
                            <td>{{ $data['likes'] }}</td>
                            <td>{{ number_format($data['representacion_porcentaje_likes'], 4) }}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- Cierre de table-responsive -->
        </div>
    </div>
    
    </script>
        <div class="container mt-4">
            <h2 class="text-center">Cantidad de Videos por Ritmo</h2>
            <canvas id="videosPorRitmo"></canvas>
        </div>
        <script>
            const ctxRitmo = document.getElementById('videosPorRitmo');
            new Chart(ctxRitmo, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($ritmos_labels) !!}, 
                    datasets: [{
                        label: 'Cantidad de Videos',
                        data: {!! json_encode($ritmos_data) !!}, 
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
<div class="container mt-4">
    <h2 class="text-center">Vistas Acumuladas por Ritmo</h2>
    <canvas id="vistasAcumuladasPorRitmo"></canvas>
</div>
<script>
    const ctxVistas = document.getElementById('vistasAcumuladasPorRitmo');
    new Chart(ctxVistas, {
        type: 'bar', 
        data: {
            labels: {!! json_encode($ritmos_labels) !!},  
            datasets: [{
                label: 'Vistas Acumuladas', 
                data: {!! json_encode($ritmos_vistas_data) !!}, 
                backgroundColor: 'rgba(153, 102, 255, 0.2)', 
                borderColor: 'rgba(153, 102, 255, 1)', 
                borderWidth: 1 
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });
</script>
<div class="container mt-4">
    <h2 class="text-center">Likes Acumulados por Ritmo</h2>
    <canvas id="likesAcumuladosPorRitmo"></canvas>
</div>
<script>
    const ctxLikes = document.getElementById('likesAcumuladosPorRitmo');
    new Chart(ctxLikes, {
        type: 'bar',
        data: {
            labels: {!! json_encode($ritmos_labels) !!},
            datasets: [{
                label: 'Likes Acumulados',
                data: {!! json_encode($likes_acumulados_data) !!}, 
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
            },
        }
    });
</script>
</body>
</html>
