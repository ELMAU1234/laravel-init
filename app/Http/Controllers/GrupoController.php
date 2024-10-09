<?php

namespace App\Http\Controllers;

use App\Models\Matriz;

use App\Models\Cancion;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Si se pasa un género musical, filtra los grupos por ese género
        if ($request->has('genero_musical') && $request->genero_musical != '') {
            $grupos = Grupo::where('genero_musical', $request->genero_musical)->get();
        } else {
            // Si no se pasa ningún género, muestra todos los grupos
            $grupos = Grupo::all();
        }

        // Devolver la vista con los grupos filtrados
        return view('grupos.index', compact('grupos'));
    }

    public function index1()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar que sea una imagen
            'contacto_whatsapp' => 'nullable|string|max:15',
            'url_facebook' => 'nullable|string|max:255',
            'url_tiktok' => 'nullable|string|max:255',
            'url_instagram' => 'nullable|string|max:255',
            'url_youtube' => 'nullable|string|max:255',
            'genero_musical' => 'required|string|max:100',
        ]);

        // Verificar si se ha subido una imagen
        if ($request->hasFile('imagen')) {
            // Guardar la imagen directamente en la carpeta public/imagenes
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName(); // Genera un nombre único
            $imagen->move(public_path('imagenes'), $nombreImagen); // Mueve la imagen a la carpeta public/imagenes
            $data['imagen'] = 'imagenes/' . $nombreImagen; // Guarda la ruta de la imagen en la base de datos
        }

        // Crear el nuevo grupo
        Grupo::create($data);

        // Redirigir a la página de grupos
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo) 
    {
        return view('grupos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('grupos.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image',
            'contacto_whatsapp' => 'nullable|string|max:15',
            'url_facebook' => 'nullable|string|max:255',
            'url_tiktok' => 'nullable|string|max:255',
            'url_instagram' => 'nullable|string|max:255',
            'url_youtube' => 'nullable|string|max:255',
            'genero_musical' => 'required|string|max:100',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $grupo->update($data);

        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupos.index')->with('success', 'Grupo eliminado con éxito');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('search');

        $grupos = Grupo::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->get();

        return view('grupos.busqueda', compact('grupos', 'query'));
    }

    public function eliminarPorNombre(Request $request)
    {
        // Validar el nombre recibido
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Eliminar todos los grupos que coincidan con el nombre
        $gruposEliminados = Grupo::where('nombre', $request->nombre)->delete();

        if ($gruposEliminados > 0) {
            return redirect()->route('grupos.index')->with('success', 'Grupo(s) eliminado(s) correctamente.');
        } else {
            return redirect()->route('grupos.index')->with('error', 'No se encontró ningún grupo con ese nombre.');
        }
    }

    public function mostrarEstadisticas($id)
    {
        $grupo = Grupo::with('canciones')->findOrFail($id);
        $totalCanciones = $grupo->canciones->count();
        $matrizData = [];
        foreach ($grupo->canciones->groupBy('ritmo') as $ritmo => $canciones) {
            $cantidad = $canciones->count();
            $vistas = $canciones->sum('vistas');
            $likes = $canciones->sum('likes');
            $porcentajeCantidad = ($totalCanciones > 0) ? ($cantidad / $totalCanciones) * 100 : 0;
            $porcentajeVistas = ($vistas > 0) ? ($vistas / $grupo->canciones->sum('vistas')) * 100 : 0;
            $porcentajeLikes = ($likes > 0) ? ($likes / $grupo->canciones->sum('likes')) * 100 : 0;

            $matrizData[] = [
                'ritmo' => $ritmo,
                'cantidad' => $cantidad,
                'representacion_porcentaje_cantidad' => $porcentajeCantidad,
                'vistas' => $vistas,
                'representacion_porcentaje_vistas' => $porcentajeVistas,
                'likes' => $likes,
                'representacion_porcentaje_likes' => $porcentajeLikes,
            ];
        }
        // Guardar todos los datos en la tabla Matriz
        Matriz::insert($matrizData);

        return view('grupos.estadisticas', compact('grupo', 'matrizData'));
    }


    public function estadisticas($grupoId)
    {
       // Obtiene el grupo
       $grupo = Grupo::find($grupoId);
        
       // Obtén las canciones del grupo
       $canciones = $grupo->canciones;
   
       // Inicializa un array para almacenar los ritmos y sus conteos
       $ritmosCount = [];
       foreach ($canciones as $cancion) {
           $ritmo = $cancion->ritmo;
           if (!isset($ritmosCount[$ritmo])) {
               $ritmosCount[$ritmo] = 0;
           }
           $ritmosCount[$ritmo]++;
       }
   
       // Calcula la cantidad total de canciones
       $totalCanciones = count($canciones);
   
       // Prepara los datos para la matriz
       $matrizData = [];
       foreach ($ritmosCount as $ritmo => $cantidad) {
           $vistas = array_sum(array_column($canciones->where('ritmo', $ritmo)->toArray(), 'vistas'));
           $likes = array_sum(array_column($canciones->where('ritmo', $ritmo)->toArray(), 'likes'));
   
           $matrizData[] = [
               'ritmo' => $ritmo,
               'cantidad' => $cantidad,
               'representacion_porcentaje_cantidad' => $totalCanciones > 0 ? ($cantidad / $totalCanciones) * 100 : 0,
               'vistas' => $vistas,
               'representacion_porcentaje_vistas' => array_sum(array_column($canciones->toArray(), 'vistas')) > 0 ? ($vistas / array_sum(array_column($canciones->toArray(), 'vistas'))) * 100 : 0,
               'likes' => $likes,
               'representacion_porcentaje_likes' => array_sum(array_column($canciones->toArray(), 'likes')) > 0 ? ($likes / array_sum(array_column($canciones->toArray(), 'likes'))) * 100 : 0,
           ];
       }
   
       // Preparar etiquetas y datos para el gráfico de cantidad de canciones por ritmo
       $ritmos_labels = array_column($matrizData, 'ritmo');
       $ritmos_data = array_column($matrizData, 'cantidad');
   
       // Inicializa un array para almacenar los ritmos y sus conteos de vistas
       $ritmosVistas = [];
       foreach ($canciones as $cancion) {
           $ritmo = $cancion->ritmo;
           if (!isset($ritmosVistas[$ritmo])) {
               $ritmosVistas[$ritmo] = 0; // Inicializa el conteo de vistas para este ritmo
           }
           $ritmosVistas[$ritmo] += $cancion->vistas; // Suma las vistas de la canción al ritmo correspondiente
       }
   
       // Prepara los datos para el gráfico de vistas por ritmo
       $ritmos_labels = array_keys($ritmosVistas); // Obtener ritmos
       $ritmos_vistas_data = array_values($ritmosVistas); // Obtener vistas acumuladas
       $ritmosLikes = [];
       foreach ($canciones as $cancion) {
           $ritmo = $cancion->ritmo;
           if (!isset($ritmosLikes[$ritmo])) {
               $ritmosLikes[$ritmo] = 0; // Inicializa el conteo de likes para este ritmo
           }
           $ritmosLikes[$ritmo] += $cancion->likes; // Suma los likes de la canción al ritmo correspondiente
       }
       
       // Prepara los datos para el gráfico de likes
       $ritmos_labels = array_keys($ritmosLikes); // Obtener ritmos
       $likes_acumulados_data = array_values($ritmosLikes); // Obtener likes acumulados
       return view('grupos.estadisticas', compact('grupo', 'matrizData', 'ritmos_labels', 'ritmos_data', 'ritmos_vistas_data', 'likes_acumulados_data'));

}



//guardar fecha video, vistas, likes tabla canciones
public function guardar(Request $request)
    {
        // Asumiendo que ya tienes los datos en la vista, puedes procesarlos aquí.
        $canciones = $request->input('canciones'); // O ajusta esto según cómo se estén enviando los datos

        foreach ($canciones as $data) {
            $cancion = Cancion::find($data['id']);
            $cancion->fecha_publicacion = $data['fecha_publicacion'];
            $cancion->vistas = $data['vistas'];
            $cancion->likes = $data['likes'];
            $cancion->save();
        }

        return redirect()->back()->with('success', 'Datos guardados con éxito');
    }
}
