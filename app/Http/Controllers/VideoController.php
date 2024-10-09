<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create()
    {
        return view('videos.create'); // Mostrar formulario de creación
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'link_video' => 'required|url'
        ]);

        Video::create($data);

        return redirect()->route('welcome')->with('success', 'Video añadido correctamente.');
    }

    public function index()
    {
        // Muestra todos los videos
        $videos = Video::all();
        return view('welcome', compact('videos'));
    }
}
