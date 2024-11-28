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
        // Crear la tabla 'rol'
        Schema::create('rol', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Modificar la tabla 'users' para usar 'role_id' que hace referencia a 'rol'
        Schema::table('users', function (Blueprint $table) {
            // Eliminar la columna anterior 'role' si existiera
            $table->dropColumn('role_id');

            // Crear la columna 'role_id' y establecer la relación con la tabla 'rol'
            $table->foreignId('role_id')->constrained('rol')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la columna 'role_id' en la tabla 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            // Volver a crear la columna 'role' en caso de reversión
            $table->string('role_id');
        });

        // Eliminar la tabla 'rol' si existe
        Schema::dropIfExists('rol');
    }
};
