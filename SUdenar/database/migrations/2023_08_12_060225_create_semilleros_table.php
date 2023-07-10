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
        Schema::create('semilleros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->string('logo'); // Ruta o nombre del archivo de logo
            $table->text('descripcion');
            $table->text('mision');
            $table->text('vision');
            $table->text('valores');
            $table->text('objetivos');
            $table->text('lineas_investigacion');
            $table->string('archivo_presentacion'); // Ruta o nombre del archivo adjunto
            $table->string('numero_resolucion_creacion');
            $table->date('fecha_resolucion_creacion');
            $table->string('archivo_resolucion_creacion'); // Ruta o nombre del archivo adjunto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semilleros');
    }
};
