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
        Schema::create('planificadors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('lunes')->nullable();
        $table->string('martes')->nullable();
        $table->string('miercoles')->nullable();
        $table->string('jueves')->nullable();
        $table->string('viernes')->nullable();
        $table->text('objetivos')->nullable();
        $table->text('notas')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planificadors');
    }
};
