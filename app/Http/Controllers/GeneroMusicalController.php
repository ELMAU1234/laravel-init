<?php

namespace App\Http\Controllers;
use App\Models\GeneroMusical;
use Illuminate\Http\Request;

class GeneroMusicalController extends Controller
{
    public function buscarGeneros(Request $request) {
        $genero = $request->query('genero');
        $generos = GeneroMusical::where('nombre', 'like', '%' . $genero . '%')->get();
        return response()->json($generos);
    }
    
}
