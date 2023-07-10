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
        Schema::create('coordinadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('identificacion')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->string('programa_academico');
            $table->string('areas_conocimiento');
            $table->date('fecha_vinculacion');
            $table->string('acuerdo_nombramiento'); // Ruta o nombre del archivo adjunto
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinadores');
    }
};
