<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    public function getVideoData(Request $request)
    {
        // Obtener la URL del video proporcionada por el usuario
        $videoUrl = $request->input('video_url');

        // Extraer el ID del video de la URL
        $videoId = $this->extractVideoId($videoUrl);

        if (!$videoId) {
            return view('youtube', ['error' => 'No se pudo extraer el ID del video.']);
        }

        // Reemplaza esto con tu propia API Key
        $apiKey = 'AIzaSyAQ_MTXLm6LwaKq486rKRJ4J_VdtHYbAHg'; 

        // Hacer la petición a la API de YouTube
        $response = Http::get('https://www.googleapis.com/youtube/v3/videos', [
            'id' => $videoId,
            'part' => 'statistics',
            'key' => $apiKey,
        ]);

        // Si la respuesta es exitosa, obtenemos los datos
        if ($response->successful()) {
            $data = $response->json();

            // Extraer el número de vistas
            $views = $data['items'][0]['statistics']['viewCount'];

            // Retornar la vista con el número de vistas
            return view('youtube', ['views' => $views]);
        }

        return view('youtube', ['error' => 'No se pudo obtener los datos del video.']);
    }

    // Función para extraer el ID del video de la URL
    private function extractVideoId($url)
    {
        // Patrón para URLs estándar y acortadas de YouTube
        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
        return $matches[1] ?? null; // Devuelve el ID si lo encuentra, o null si no lo encuentra
    }
     public function showAddVideoForm()
    {
        return view('youtube');  // Asegúrate de que el archivo se llama youtube.blade.php y está en la carpeta correcta
    }
}
