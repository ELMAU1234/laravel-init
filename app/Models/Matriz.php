<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriz extends Model
{
    use HasFactory;
    protected $table = 'matriz'; 
    protected $fillable = ['ritmo', 'cantidad', 'representacion_porcentaje_cantidad', 'vistas', 'representacion_porcentaje_vistas', 'likes', 'representacion_porcentaje_likes'];


    
}
