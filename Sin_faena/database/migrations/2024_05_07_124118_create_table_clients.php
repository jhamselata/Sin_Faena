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
        Schema::create('TIPO_CLIENTE', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipoCli');
            $table->string('descripcion_tipoCli')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('CLIENTE', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_tipoCliente')->references('id')->on('tipo_cliente')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_cli');
            $table->string('apellido_cli')->nullable();
            $table->string('rnc_cli')->nullable();
            $table->string('telefono_cli');
            $table->string('estado_cli')->default('Activo');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_CLIENTE');

        Schema::dropIfExists('CLIENTE');
    }
};
