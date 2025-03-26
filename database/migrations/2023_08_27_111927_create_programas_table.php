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
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->unsignedBigInteger('dependencia_id');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->string('tipo_de_programa');
            $table->text('objetivo');
            $table->text('que_ofrece');
            $table->text('a_quien_va_dirigido');
            $table->text('donde_solicitarlo')->nullable();
            $table->text('vigencia')->nullable();
            $table->string('archivo')->nullable();
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
        Schema::dropIfExists('programas');
    }
};
