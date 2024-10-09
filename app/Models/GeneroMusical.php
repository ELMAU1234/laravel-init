<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneroMusical extends Model
{
    use HasFactory;

    protected $table = 'generos_musicales'; // Asegúrate de que coincida con el nombre de tu tabla
    protected $fillable = ['nombre']; 
}
