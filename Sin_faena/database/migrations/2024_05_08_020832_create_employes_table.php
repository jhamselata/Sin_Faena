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
        Schema::create('EMPLEADO', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_emp', 49);
            $table->string('apellido_emp', 49);
            $table->string('cedula', 13)->nullable();
            $table->string('telefono', 12);
            $table->foreignId('id_depto')->references('id')->on('departamento')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_puesto')->references('id')->on('puesto')->onDelete('cascade')->onUpdate('cascade');
            $table->string('estado_emp', 49);

            $table->timestamps();
            $table->softDeletes();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EMPLEADO');
    }
};
