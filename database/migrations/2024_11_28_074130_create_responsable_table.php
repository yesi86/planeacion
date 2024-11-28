<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('responsable', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('name'); // Nombre del responsable
            $table->foreignId('area_id')->nullable(); // Relación con área (null por ahora) acuerdate de agregar el constrained cuando se creean
            $table->foreignId('delegado_id')->nullable(); // Relación con delegado (null por ahora)
            $table->foreignId('planeacion_id')->nullable(); // Relación con planeación (null por ahora)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsable');
    }
}
