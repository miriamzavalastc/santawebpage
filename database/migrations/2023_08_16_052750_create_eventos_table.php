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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('slug');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('lugar');
            $table->string('img');
            $table->text('contenido');
            $table->boolean('portada')->default(false);
            $table->boolean('aprobado')->default(false);
            $table->unsignedBigInteger('eventos_categorias_id');
            $table->foreign('eventos_categorias_id')->references('id')->on('eventos_categorias');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
