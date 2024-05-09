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
        Schema::create('TIPO_EQUIPO', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipoEquipo', 49);
            $table->string('descripcion_tipoEquipo', 1500);

            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('EQUIPO', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipoEquipo')->references('id')->on('tipo_equipo')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_equipo', 49);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('EQUIPO_EMPLEADO', function (Blueprint $table) {
            $table->foreignId('id_equipo')->references('id')->on('equipo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        /**
         * Cambio de nombre a la tabla 'PEDIDO_SERVICIO' por 'DETALLE_PEDIDO'
         */

        Schema::rename('pedido_servicio', 'detalle_pedido');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_EQUIPO');

        Schema::dropIfExists('EQUIPO');

        Schema::dropIfExists('EMPLEADO_EQUIPO');
    }
};
