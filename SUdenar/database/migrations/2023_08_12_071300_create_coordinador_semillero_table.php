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
        Schema::create('coordinador_semillero', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coordinador_id');
            $table->unsignedBigInteger('semillero_id')->unique(); // Asegurar que un semillero solo tenga un coordinador
            $table->timestamps();
    
            $table->foreign('coordinador_id')->references('id')->on('coordinadores')->onDelete('cascade');
            $table->foreign('semillero_id')->references('id')->on('semilleros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinador_semillero');
    }
};
