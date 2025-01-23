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
        Schema::create('acciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objetivo_area_id')->constrained('objetivo_areas')->onDelete('cascade');
            $table->string('Folio')->unique();
            $table->string('descripcion', 255);
            $table->string('capitulo', 50);
            $table->timestamps();

            $table->foreign('capitulo')
                ->references('capitulo')
                ->on('catalogo_objeto_gasto')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acciones');
    }
};
