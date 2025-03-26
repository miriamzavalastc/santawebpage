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
        Schema::create('tramites_tops', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('logo');
            $table->text('descripcion');
            $table->string('link');
            $table->text('punto_uno_titulo');
            $table->text('punto_uno_descripcion');
            $table->text('punto_dos_titulo');
            $table->text('punto_dos_descripcion');
            $table->text('punto_tres_titulo');
            $table->text('punto_tres_descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites_tops');
    }
};
