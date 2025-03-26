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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('slug');
            $table->string('tags');
            $table->string('img');
            $table->string('extracto');
            $table->text('contenido');
            $table->date('fecha');
            $table->unsignedBigInteger('noticias_categorias_id');
            $table->foreign('noticias_categorias_id')->references('id')->on('noticias_categorias');
            $table->boolean('aprobado')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
