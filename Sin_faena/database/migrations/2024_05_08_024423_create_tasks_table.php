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
        Schema::create('tarea', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titulo_tarea', 49);
            $table->string('descripcion_tarea', 2500);
            $table->timestamp('comenzae_tarea');
            $table->dateTime('terminar_tarea');
            $table->string('prioridad_tarea', 49);
            $table->string('estado_tarea', 49);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea');
    }
};
