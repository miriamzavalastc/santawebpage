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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            //datos del tramite
            $table->string('nombre');
            $table->string('slug');
            $table->unsignedBigInteger('dependencia_id');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->string('tipo_tramite');
            $table->string('folio_registro');
            $table->date('ultima_actualizacion');
            $table->boolean('frecuente')->default(false);
            $table->boolean('aprobado')->default(false);            
            $table->integer('posicion')->default(0);
            //mas datos            
            $table->string('horario_atencion')->nullable();
            $table->string('oficina_responsable')->nullable();            
            $table->string('vigencia')->nullable();
            //acerca de
            $table->text('descripcion');
            $table->text('etapas')->nullable();
            $table->string('archivo')->nullable();
            //presencial
            $table->boolean('presencial')->default(false);
            $table->text('descripcion_presencial')->nullable();
            //En Linea
            $table->boolean('en_linea')->default(false);
            $table->text('descripcion_en_linea')->nullable();
            $table->string('link_en_linea')->nullable();
            //Telefonico
            $table->boolean('telefonico')->default(false);
            $table->text('descripcion_telefonico')->nullable();
            $table->string('telefono')->nullable();
            //forma de llevarlo
            $table->string('documento_que_obtiene');
            $table->string('tiempo_de_resolucion');
            $table->string('costo');
            $table->boolean('requiere_inspeccion_municipal')->default(false);
            //requisitos
            $table->text('documentos_a_presentar');
            $table->text('criterios_resolucion')->nullable();
            $table->string('afirmativa_ficta')->nullable();
            $table->unsignedBigInteger('iconos_id')->nullable();
            $table->foreign('iconos_id')->references('id')->on('iconos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
