<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('role_id'); // Relación con roles
            $table->string('model_type'); // Tipo de modelo (User o Responsable)
            $table->unsignedBigInteger('model_id'); // ID del modelo (user_id o responsable_id)
            $table->timestamps(); // Tiempos de creación y actualización

            // Definir las relaciones
            $table->foreign('role_id')->references('id')->on('rol')->onDelete('cascade');

            // Índice compuesto para consultas más rápidas
            $table->index(['model_id', 'model_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_has_roles');
    }
};
