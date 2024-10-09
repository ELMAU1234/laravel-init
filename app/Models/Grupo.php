<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';  // Nombre de la tabla en la base de datos

    // Especifica los campos que son asignables en masa
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'contacto_whatsapp',
        'url_facebook',
        'url_tiktok',
        'url_instagram',
        'url_youtube',
        'genero_musical'
    ];

    // Relación de uno a muchos: Un grupo tiene muchas canciones
    public function canciones()
    {
        return $this->hasMany(Cancion::class, 'grupo_id');
    }
}
