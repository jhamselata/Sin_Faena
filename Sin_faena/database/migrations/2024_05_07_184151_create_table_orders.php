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
        Schema::create('PEDIDO', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcion_pedido', 2500);
            $table->timestamp('fecha_pedido');
            $table->string('estado_pedido', 49)->default('Pendiente');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('PEDIDO_SERVICIO', function (Blueprint $table) {
            $table->foreignId('id_pedido')->references('id')->on('pedido')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_servicio')->references('id')->on('servicio')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PEDIDO');

        Schema::dropIfExists('PEDIDO_SERVICIO');
    }
};
