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
        Schema::create('paginas_galerias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paginas_id');
            $table->foreign('paginas_id')->references('id')->on('paginas');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas_galerias');
    }
};
