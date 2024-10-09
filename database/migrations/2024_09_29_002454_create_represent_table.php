<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('represent', function (Blueprint $table) {
            $table->id(); // Esto crea la columna 'id' con autoincremento automáticamente.
            $table->unsignedBigInteger('cancion_id'); // Llave foránea
            $table->decimal('representacion_vistas', 5, 4); // Vistas representadas
            $table->decimal('representacion_likes', 5, 4);  // Likes representados
            $table->integer('cantidad_ritmo'); // Cantidad de ritmo
            $table->decimal('representacion_cantidad', 5, 4); // Cantidad representada
            $table->bigInteger('vistas_genero'); // Vistas del género
            $table->decimal('representacion_vistas_genero', 5, 4); // Vistas del género representadas
            $table->foreign('cancion_id')->references('id')->on('canciones')->onDelete('cascade');
            $table->timestamps(); // Esto agrega las columnas created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('represent');
    }
};
