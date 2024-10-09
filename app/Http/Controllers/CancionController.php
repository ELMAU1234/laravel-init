<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Models\Cancion;
use Illuminate\Http\Request;
use App\Models\Grupo;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canciones = Cancion::with('grupo')->get();
        return view('canciones.index', compact('canciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('canciones.create', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'grupo_id' => 'required|exists:grupos,id',
            'fecha_publicacion' => 'nullable|date',
            'vistas' => 'nullable|integer',
            'likes' => 'nullable|integer',
            'ritmo' => 'nullable|string|max:50',
            'video' => 'required|boolean',
            'link_video' => 'nullable|string|max:255',
        ]);

        Cancion::create($data);

        return redirect()->back()->with('success', 'Datos guardados con éxito');



        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {
        return view('canciones.show', compact('cancion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        $grupos = Grupo::all();
        return view('canciones.edit', compact('cancion', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancion $cancion)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'grupo_id' => 'required|exists:grupos,id',
            'fecha_publicacion' => 'nullable|date',
            'vistas' => 'nullable|integer',
            'likes' => 'nullable|integer',
            'ritmo' => 'nullable|string|max:50',
            'video' => 'required|boolean',
            'link_video' => 'nullable|string|max:255',


            
        ]);

        $cancion->update($data);

        return redirect()->route('canciones.index')->with('success', 'Canción actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        $cancion->delete();
        return redirect()->route('canciones.index')->with('success', 'Canción eliminada correctamente');
    }
 
    
    public function guardarDatosYouTube(Request $request)
    {
        // Obtén los datos de YouTube
        $youtubePublishedAt = $request->input('youtubePublishedAt'); 
        $youtubeViewCount = $request->input('youtubeViewCount'); 
        $youtubeLikeCount = $request->input('youtubeLikeCount'); 
        $cancionId = $request->input('cancion_id'); // ID de la canción a actualizar


        
        $totalVistas = Cancion::sum('vistas'); // Total de vistas de todas las canciones
        $totalLikes = Cancion::sum('likes'); // Total de likes de todas las canciones
        $representacionVistas = $totalVistas > 0 ? round(($youtubeViewCount / $totalVistas) * 100, 5) : 0;
        $representacionLikes = $totalLikes > 0 ? round(($youtubeLikeCount / $totalLikes) * 100, 5) : 0;
        
    
        // Actualiza solo la canción especificada
        $cancion = Cancion::findOrFail($cancionId);
        
        $cancion->update([
            'fecha_publicacion' => $youtubePublishedAt,
            'vistas' => $youtubeViewCount,
            'likes' => $youtubeLikeCount,
            'Representacion_Vistas' => $representacionVistas,
            'Representacion_Likes' => $representacionLikes,
        ]);

        
    
        return redirect()->back()->with('success', 'Datos guardados con éxito');
    }
    
    
    
}
