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
        Schema::create('participaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_id'); // Clave Foránea
            $table->unsignedBigInteger('evento_id'); // Clave Foránea
            $table->unsignedBigInteger('semillero_id'); // Clave Foránea
            $table->unsignedBigInteger('semillerista_id'); // Clave Foránea
            $table->string('tipo_participacion');
            $table->integer('calificacion')->nullable();
            $table->string('archivo_certificacion')->nullable();
            $table->json('evidencias')->nullable();
            $table->timestamps();
    
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('semillero_id')->references('id')->on('semilleros')->onDelete('cascade');
            $table->foreign('semillerista_id')->references('id')->on('semilleristas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participaciones');
    }
};
