<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAreaPositionTable extends Migration
{
    public function up()
    {
        Schema::create('user_area_position', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('area_superior_id')->nullable()->constrained('area_superior')->onDelete('set null');
            $table->foreignId('area_responsable_id')->nullable()->constrained('area_responsable')->onDelete('set null');
            $table->foreignId('departamento_id')->nullable()->constrained('departamento')->onDelete('set null');
            $table->foreignId('division_id')->nullable()->constrained('divisiones_carrera')->onDelete('set null');
            $table->foreignId('puesto_id')->nullable()->constrained('puesto')->onDelete('set null');
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_area_position');
    }
}
