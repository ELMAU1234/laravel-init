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
        Schema::create('matriz', function (Blueprint $table) {
            $table->id('id_matriz'); // Crea un campo id_matriz que es clave primaria
            $table->string('ritmo');
            $table->integer('cantidad');
            $table->decimal('representacion_porcentaje_cantidad', 5, 4);
            $table->bigInteger('vistas');
            $table->decimal('representacion_porcentaje_vistas', 5, 4);
            $table->integer('likes');
            $table->decimal('representacion_porcentaje_likes', 5, 4);
            $table->timestamps(); // Crea campos de created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriz');
    }
};
