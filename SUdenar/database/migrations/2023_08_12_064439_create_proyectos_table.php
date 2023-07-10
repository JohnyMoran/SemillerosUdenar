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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('titulo');
            $table->json('integrantes'); // JSON o array para almacenar los integrantes
            $table->string('tipo_proyecto');
            $table->string('estado');
            $table->date('fecha_inicio');
            $table->date('fecha_finalizacion');
            $table->string('archivo_propuesta'); // Ruta o nombre del archivo adjunto
            $table->string('archivo_proyecto_final')->nullable(); // Ruta o nombre del archivo adjunto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
