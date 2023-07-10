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
        Schema::create('semilleristas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('identificacion')->unique();
            $table->string('codigo_estudiantil')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->integer('semestre');
            $table->string('foto'); // Ruta o nombre del archivo de foto
            $table->string('reporte_matricula'); // Ruta o nombre del archivo adjunto
            $table->string('programa_academico');
            $table->date('fecha_vinculacion');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semilleristas');
    }
};
