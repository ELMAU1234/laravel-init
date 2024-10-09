<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    protected $table = 'canciones';  // Nombre de la tabla en la base de datos

    // Especifica los campos que son asignables en masa
    protected $fillable = [
        'titulo',
        'grupo_id',
        'fecha_publicacion',
        'vistas',
        'likes',
        'ritmo',
        'video',
        'link_video',
        'Representacion_Vistas',
        'Representacion_Likes',
        
    ];


    // Relación de muchos a uno: Muchas canciones pertenecen a un grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
