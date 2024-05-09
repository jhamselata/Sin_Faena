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
        Schema::create('TIPO_INFORME', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipoInforme', 49);
            $table->string('descripcion_tipoInforme', 1500);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('INFORME', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_informe');
            $table->foreignId('id_remitente')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_destinatario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_tipoInforme')->references('id')->on('tipo_informe')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo_informe', 49);
            $table->string('descripcion_informe', 2500);
           
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_INFORME');
        
        Schema::dropIfExists('INFORME');
    }
};
