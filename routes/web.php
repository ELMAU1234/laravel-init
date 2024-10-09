<?php

use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MatrizController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\YouTubeController;
// -----------------------
// Página principal
// -----------------------
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// -----------------------
// Rutas para GRUPOS
// -----------------------

// Listar grupos
Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');

// Formulario para crear grupo
Route::get('/grupos/create', [GrupoController::class, 'create'])->name('grupos.create');

// Guardar grupo
Route::post('/grupos/store', [GrupoController::class, 'store'])->name('grupos.store');

// Buscar grupos
Route::get('/grupos/buscar', [GrupoController::class, 'buscar'])->name('grupos.buscar');

// Formulario para editar grupo
Route::get('/grupos/edit', [GrupoController::class, 'edit'])->name('grupos.edit');



// Actualizar grupo
Route::put('/grupos/{grupo}', [GrupoController::class, 'update'])->name('grupos.update');

// Eliminar grupo
Route::delete('/grupos/{grupo}', [GrupoController::class, 'destroy'])->name('grupos.destroy');

// Eliminar grupos por nombre
Route::post('/grupos/eliminar', [GrupoController::class, 'eliminarPorNombre'])->name('grupos.eliminarPorNombre');

// Autocompletado de búsqueda de nombres de grupos
Route::get('/buscar-grupos', function (Request $request) {
    $nombre = $request->query('nombre');
    $grupos = Grupo::where('nombre', 'like', '%' . $nombre . '%')->get();
    return response()->json($grupos);
});

// Autocompletado de géneros musicales (basado en la tabla grupos)
Route::get('/buscar-generos', function (Request $request) {
    $genero = $request->query('genero');
    $generos = Grupo::where('genero_musical', 'like', '%' . $genero . '%')
                    ->select('genero_musical')
                    ->distinct()
                    ->get();
    return response()->json($generos);
});

// Mostrar estadísticas de un grupo
Route::get('/grupos/{id}/estadisticas', [GrupoController::class, 'mostrarEstadisticas'])->name('grupos.estadisticas');
Route::get('grupos/{grupo}/estadisticas', [GrupoController::class, 'estadisticas'])->name('grupos.estadisticas');

// Buscar en grupos
Route::get('grupos/search', [GrupoController::class, 'search'])->name('grupos.search');

// Generar y mostrar matriz
Route::get('/grupos/{id}/estadisticas', [GrupoController::class, 'estadisticas']);
Route::get('grupos/search', [GrupoController::class, 'search'])->name('grupos.search');
Route::get('/generar-matriz', [GrupoController::class, 'generarMatriz'])->name('generar.matriz');
Route::get('/matriz', [GrupoController::class, 'mostrarMatriz'])->name('matriz.index');
Route::get('/generar-matriz', [GrupoController::class, 'generarMatriz'])->name('generar.matriz');
Route::get('/matriz', [GrupoController::class, 'mostrarMatriz'])->name('matriz.index');

// -----------------------
// Rutas para CANCIONES
// -----------------------

// Listar canciones
Route::get('/canciones', [CancionController::class, 'index'])->name('canciones.index');

// Formulario para crear canción
Route::get('/canciones/create', [CancionController::class, 'create'])->name('canciones.create');

// Guardar canción
Route::post('/canciones/store', [CancionController::class, 'store'])->name('canciones.store');

// Formulario para editar canción
Route::get('/canciones/{cancion}/edit', [CancionController::class, 'edit'])->name('canciones.edit');

// Actualizar canción
Route::put('/canciones/{cancion}', [CancionController::class, 'update'])->name('canciones.update');

// Eliminar canción
Route::delete('/canciones/{cancion}', [CancionController::class, 'destroy'])->name('canciones.destroy');

// -----------------------
// Otras rutas adicionales
// -----------------------
Route::resource('canciones', CancionController::class);


Route::get('/videos/agregar', function () {
    return view('videos.add');
})->name('videos.add');



Route::post('/canciones/guardar-datos-youtube', [CancionController::class, 'guardarDatosYouTube'])->name('canciones.guardarDatosYouTube');



