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
        Schema::create('objetivo', function (Blueprint $table) {
            $table->id();
            $table->string('Folio', 255)->unique();
            $table->string('descripcion', 50);

            $table->foreignId('area_superior_id')
                ->nullable()
                ->constrained('area_superior')
                ->onDelete('set null');
            $table->foreignId('area_responsable_id')
                ->nullable()
                ->constrained('area_responsable')
                ->onDelete('set null');
            $table->foreignId('departamento_id')
                ->nullable()
                ->constrained('departamento')
                ->onDelete('set null');
            $table->foreignId('divisiones_carrera_id')
                ->nullable()
                ->constrained('divisiones_carrera')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetivo');
    }
};
