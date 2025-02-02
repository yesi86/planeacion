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
        Schema::create('objetivo_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objetivo_id')->constrained('objetivo')->onDelete('cascade');
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade'); // ID genérico del área
            $table->string('tipo'); // Indica el tipo de área
            $table->timestamps();
            $table->unique(['objetivo_id', 'area_id', 'tipo']); // Evita duplicados para un mismo objetivo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetivo_areas');
    }
};
