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
        Schema::create('semillero_semillerista', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semillero_id');
            $table->unsignedBigInteger('semillerista_id');
            $table->timestamps();

            $table->foreign('semillero_id')->references('id')->on('semilleros')->onDelete('cascade');
            $table->foreign('semillerista_id')->references('id')->on('semilleristas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semillero_semillerista');
    }
};
