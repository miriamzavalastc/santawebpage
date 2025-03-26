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
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('presidente');
            $table->string('secretario');
            $table->string('vocal');
            $table->string('tipo');
            $table->integer('posicion')->default(0);
            $table->boolean('aprobado')->default(false);
            $table->unsignedBigInteger('icon_id');
            $table->foreign('icon_id')->references('id')->on('icons');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comisiones');
    }
};
