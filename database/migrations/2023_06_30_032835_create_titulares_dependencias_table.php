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
        Schema::create('titulares_dependencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 191);
            $table->string('cargo', 191);
            $table->string('telefono', 191);
            $table->string('extension', 191);
            $table->string('correo', 191);
            $table->string('img');
            $table->text('seemblanza');
            $table->integer('posicion')->default(0);
            $table->boolean('aprobado')->default(false);
            $table->unsignedBigInteger('dependencia_id');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulares_dependencias');
    }
};
