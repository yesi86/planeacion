<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * esta tabla es para poder agregar los campos 
     * de area y puesto a la migration users y no tener
     * errores a la hora de hacer migration
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('puesto_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('puesto_id')->references('id')->on('puesto')->onDelete('set null');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['puesto_id']);
            $table->dropForeign(['area_id']);
            $table->dropColumn(['puesto_id', 'area_id']);
        });
    }
};
