<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all(); 
        return view('welcome', compact('grupos'));
        //return view('welcome', compact('videos'));
    }
}
