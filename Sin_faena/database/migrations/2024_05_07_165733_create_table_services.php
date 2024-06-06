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
        Schema::create('TIPO_SERVICIO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipoServicio', 49);
            $table->string('descripcion_tipoServicio', 1500);


            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('SERVICIO', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipoServicio')->references('id')->on('tipo_servicio')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_servicio', 255);
            $table->string('descripcion_servicio', 1500);
            $table->float('precio_servicio');
            $table->string('duracion_estimada', 49);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_SERVICIOS');
        Schema::dropIfExists('SERVICIOS');
    }
};
