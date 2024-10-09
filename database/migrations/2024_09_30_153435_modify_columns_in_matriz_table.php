<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('matriz', function (Blueprint $table) {
            // Cambiar el tipo de las columnas a DECIMAL para aceptar valores más grandes
            $table->decimal('representacion_porcentaje_cantidad', 5, 2)->change();
            $table->decimal('representacion_porcentaje_likes', 5, 2)->change();
            $table->decimal('representacion_porcentaje_vistas', 5, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriz', function (Blueprint $table) {
            // Si quieres revertir los cambios, restaura el tipo de dato original
            $table->tinyInteger('representacion_porcentaje_cantidad')->change();
            $table->tinyInteger('representacion_porcentaje_likes')->change();
            $table->tinyInteger('representacion_porcentaje_vistas')->change();
        });
    }
};
