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
        Schema::create('catalogo_objeto_gasto', function (Blueprint $table) {
            $table->id();
            $table->string('capitulo', 50);
            $table->string('partida', 50);
            $table->string('descripcion');
            $table->timestamps();
            $table->unique(['capitulo', 'partida'], 'capitulo_partida_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogo_objeto_gasto');
    }
};
