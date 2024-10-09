<?php

namespace App\Http\Controllers;
use App\Models\Cancion;
use Illuminate\Http\Request;
use App\Models\Matriz; // Importa el modelo Matriz

class MatrizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los registros de la tabla matriz
        $items = Matriz::all();
        return view('matriz.index', compact('items')); // Retorna la vista con los datos
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna la vista para crear un nuevo registro
        return view('matriz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos entrantes
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'vistas' => 'required|integer',
            'likes' => 'required|integer',
            'ritmo' => 'required|string|max:100',
            'video' => 'required|string|max:255',
            'representacion_vistas' => 'required|numeric',
            'representacion_likes' => 'required|numeric',
        ]);

        // Crea un nuevo registro en la tabla matriz
        Matriz::create($request->all());

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('matriz.index')->with('success', 'Registro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca un registro por su ID y lo muestra
        $item = Matriz::findOrFail($id);
        return view('matriz.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busca el registro por ID y muestra el formulario de edición
        $item = Matriz::findOrFail($id);
        return view('matriz.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los datos entrantes
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'vistas' => 'required|integer',
            'likes' => 'required|integer',
            'ritmo' => 'required|string|max:100',
            'video' => 'required|string|max:255',
            'representacion_vistas' => 'required|numeric',
            'representacion_likes' => 'required|numeric',
        ]);

        // Actualiza el registro con los datos recibidos
        $item = Matriz::findOrFail($id);
        $item->update($request->all());

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('matriz.index')->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimina el registro por su ID
        $item = Matriz::findOrFail($id);
        $item->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('matriz.index')->with('success', 'Registro eliminado correctamente.');
    }
    

}
